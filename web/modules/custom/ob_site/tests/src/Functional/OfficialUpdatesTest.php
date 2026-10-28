<?php

declare(strict_types=1);

namespace Drupal\Tests\ob_site\Functional;

use Drupal\Core\Entity\Entity\EntityViewDisplay;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\media\Entity\MediaType;
use Drupal\node\Entity\Node;
use Drupal\node\Entity\NodeType;
use Drupal\node\NodeInterface;
use Drupal\taxonomy\Entity\Term;
use Drupal\Tests\BrowserTestBase;
use Drupal\user\Entity\Role;
use Drupal\views\Entity\View;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\PreserveGlobalState;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use Symfony\Component\Yaml\Yaml;

/**
 * Protects the public board and its existing admin editing workflow.
 */
#[Group('ob_site')]
#[RunTestsInSeparateProcesses]
#[PreserveGlobalState(FALSE)]
final class OfficialUpdatesTest extends BrowserTestBase {

  protected static $modules = [
    'block', 'block_content', 'datetime', 'file', 'image', 'link', 'media',
    'media_library', 'menu_ui', 'node', 'options', 'path', 'responsive_image',
    'search_node', 'taxonomy', 'text', 'views', 'page_cache', 'dynamic_page_cache',
  ];

  protected $defaultTheme = 'ob';

  private NodeInterface $homepage;

  private Term $announcement;

  protected function setUp(): void {
    parent::setUp();
    $directory = DRUPAL_ROOT . '/../config/sync/';
    // The real site supplies this media bundle before ob_site's seeded logo.
    MediaType::create(Yaml::parseFile($directory . 'media.type.image.yml'))->save();
    FieldStorageConfig::create(Yaml::parseFile($directory . 'field.storage.media.field_media_image.yml'))->save();
    FieldConfig::create(Yaml::parseFile($directory . 'field.field.media.image.field_media_image.yml'))->save();
    EntityViewDisplay::create(Yaml::parseFile($directory . 'core.entity_view_display.media.image.default.yml'))->save();
    // Installation helpers also reuse field storage supplied by site config.
    foreach (glob($directory . 'field.storage.node.*.yml') as $file) {
      $storage = Yaml::parseFile($file);
      // Custom holiday fields are created by ob_site after its plugins load.
      if (($storage['module'] ?? NULL) === 'ob_site') {
        continue;
      }
      if (!FieldStorageConfig::loadByName('node', $storage['field_name'])) {
        if (!empty($storage['settings']['allowed_values'])) {
          // Entity creation expects the runtime map, not exported YAML rows.
          $storage['settings']['allowed_values'] = array_column($storage['settings']['allowed_values'], 'label', 'value');
        }
        FieldStorageConfig::create($storage)->save();
      }
    }
    \Drupal::service('module_installer')->install(['ob_site']);
    Role::load('anonymous')->grantPermission('access content')->save();
    NodeType::create(Yaml::parseFile($directory . 'node.type.update.yml'))->save();
    foreach (glob($directory . 'field.field.node.update.*.yml') as $file) {
      $data = Yaml::parseFile($file);
      $name = $data['field_name'];
      if (!FieldStorageConfig::loadByName('node', $name)) {
        FieldStorageConfig::create(Yaml::parseFile($directory . "field.storage.node.$name.yml"))->save();
      }
      // Installation can provision Body as text_long. Match its actual storage
      // instead of forcing the exported site's text_with_summary item class.
      $data['field_type'] = FieldStorageConfig::loadByName('node', $name)->getType();
      if ($name === 'body' && $data['field_type'] === 'text_long') {
        unset($data['settings']['display_summary'], $data['settings']['required_summary']);
      }
      FieldConfig::create($data)->save();
    }
    foreach (['default', 'teaser'] as $mode) {
      EntityViewDisplay::create(Yaml::parseFile($directory . "core.entity_view_display.node.update.$mode.yml"))->save();
    }
    // Import the maintained Views; tests exercise their actual selection rules.
    View::create(Yaml::parseFile($directory . 'views.view.updates.yml'))->save();
    View::create(Yaml::parseFile($directory . 'views.view.homepage_featured_updates.yml'))->save();
    \Drupal::moduleHandler()->loadInclude('ob_site', 'install');
    ob_site_update_11030();
    \Drupal::service('router.builder')->rebuild();
    \Drupal::service('entity_field.manager')->clearCachedFieldDefinitions();
    \Drupal::service('typed_data_manager')->clearCachedDefinitions();
    // Discard install-time sample notices only inside this disposable test site.
    $samples = \Drupal::entityTypeManager()->getStorage('node')->loadByProperties(['type' => 'public_notice']);
    foreach ($samples as $sample) {
      $sample->delete();
    }
    $this->announcement = Term::create(['vid' => 'notice_category', 'name' => 'Announcement']);
    $this->announcement->save();
    $this->homepage = Node::create([
      'type' => 'homepage', 'title' => 'Home', 'status' => 1,
      'field_notices_heading' => 'Official updates',
    ]);
    foreach ($this->homepage->getFields() as $name => $field) {
      if (str_starts_with($name, 'field_') && $field->getFieldDefinition()->isRequired() && $field->isEmpty()) {
        $this->homepage->set($name, 'Homepage test content');
      }
    }
    $this->homepage->save();
    $this->config('system.site')->set('page.front', '/node/' . $this->homepage->id())->save();
  }

  private function update(string $title, bool $featured = TRUE, bool $published = TRUE, string $category = 'News'): NodeInterface {
    $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadByProperties(['vid' => 'update_type', 'name' => $category]);
    $term = reset($terms);
    $node = Node::create([
      'type' => 'update', 'title' => $title, 'status' => (int) $published,
      'field_featured' => (int) $featured, 'field_update_type' => $term->id(),
      'field_update_date' => '2026-10-01', 'field_summary' => 'Article summary for ' . $title,
      'body' => ['value' => 'Article body for ' . $title, 'format' => 'plain_text'],
    ]);
    $node->save();
    return $node;
  }

  private function notice(string $title, string $expiry, bool $urgent = FALSE): NodeInterface {
    $node = Node::create([
      'type' => 'public_notice', 'title' => $title, 'status' => 1,
      'field_notice_category' => $this->announcement->id(),
      'field_notice_summary' => 'Notice summary for ' . $title,
      'field_notice_date' => '2026-10-01', 'field_notice_expiry' => $expiry,
      'field_notice_urgent' => (int) $urgent,
    ]);
    $node->save();
    return $node;
  }

  public function testFeaturedContentAndCacheRefresh(): void {
    $featured = $this->update('Featured news');
    $this->update('Featured release', category: 'Press release');
    $this->update('Ordinary news', featured: FALSE);
    $this->update('Draft news', published: FALSE);
    $this->drupalGet('<front>');
    $assert = $this->assertSession();
    $assert->statusCodeEquals(200);
    $assert->elementsCount('css', '[data-official-board]', 1);
    $assert->elementTextContains('css', '[data-official-board]', 'Featured news');
    $assert->elementTextContains('css', '[data-official-board]', 'Featured release');
    $assert->elementTextNotContains('css', '[data-official-board]', 'Ordinary news');
    $assert->elementTextNotContains('css', '[data-official-board]', 'Draft news');
    // Warm the anonymous page cache, then change the existing selection.
    $this->drupalGet('<front>');
    $featured->set('field_featured', 0)->save();
    $this->drupalGet('<front>');
    $assert->elementTextNotContains('css', '[data-official-board]', 'Featured news');
    $assert->elementTextContains('css', '[data-official-board]', 'Featured release');
  }

  public function testBilingualFeaturedReleasesAppearOnce(): void {
    \Drupal::service('module_installer')->install(['language', 'content_translation']);
    \Drupal\language\Entity\ConfigurableLanguage::createFromLangcode('gil')->save();
    \Drupal::service('content_translation.manager')->setEnabled('node', 'update', TRUE);
    \Drupal::service('entity_field.manager')->clearCachedFieldDefinitions();
    $this->config('language.negotiation')->set('url.prefixes', ['en' => '', 'gil' => 'gil'])->save();
    $this->config('language.types')->set('negotiation.language_interface.enabled', ['language-url' => 0, 'language-selected' => 1])->save();
    // An English-only homepage alias must not break the Kiribati front page.
    \Drupal\path_alias\Entity\PathAlias::create([
      'path' => '/node/' . $this->homepage->id(),
      'alias' => '/home', 'langcode' => 'en',
    ])->save();
    $this->config('system.site')->set('page.front', '/home')->save();
    ob_site_update_11033();
    $this->assertSame('/node/' . $this->homepage->id(), \Drupal::config('system.site')->get('page.front'));
    $release = $this->update('English release', category: 'Press release');
    $release->addTranslation('gil', ['title' => 'Kiribati release', 'status' => 1])->save();
    // Reload language path processors after enabling multilingual services.
    $this->rebuildContainer();
    $kiribati = \Drupal::languageManager()->getLanguage('gil');
    $this->assertSame('/', \Drupal\Core\Url::fromRoute('<front>', [], ['language' => $kiribati])->toString());
    $notice = $this->notice('Shared notice', '2026-12-31');
    $this->assertStringNotContainsString('/gil', $notice->toUrl('canonical', ['language' => $kiribati])->toString());
    $this->assertStringContainsString('/gil/', $release->toUrl('canonical', ['language' => $kiribati])->toString());
    $news = $this->update('Shared news', featured: FALSE);
    $this->assertStringNotContainsString('/gil', $news->toUrl('canonical', ['language' => $kiribati])->toString());
    $notice->delete();
    $this->update('Second release', category: 'Press release');
    $this->update('Third release', category: 'Press release');
    \Drupal::service('router.builder')->rebuild();
    $assert = $this->assertSession();
    foreach (['' => 'English release', 'gil' => 'Kiribati release'] as $path => $title) {
      $this->drupalGet($path);
      $assert->statusCodeEquals(200);
      $assert->elementsCount('css', '[data-board-panel]', 3);
      $assert->elementsCount('css', '#official-update-' . $release->id(), 1);
      $assert->elementsCount('css', '[data-board-select]', 3);
      $assert->elementTextContains('css', '#official-update-' . $release->id(), $title);
    }
    // A draft in the requested language must fall back to a published version.
    $release->getTranslation('gil')->setUnpublished()->save();
    $this->drupalGet('gil');
    $assert->elementTextContains('css', '#official-update-' . $release->id(), 'English release');
    $release->getTranslation('gil')->setPublished();
    $release->getUntranslated()->setUnpublished()->save();
    $this->drupalGet('');
    $assert->elementsCount('css', '[data-board-panel]', 3);
    $assert->elementTextContains('css', '#official-update-' . $release->id(), 'Kiribati release');
  }

  public function testPublicNoticeImageAndDocuments(): void {
    Role::load('anonymous')->grantPermission('view media')->save();
    $directory = DRUPAL_ROOT . '/../config/sync/';
    if (!MediaType::load('document')) {
      MediaType::create(Yaml::parseFile($directory . 'media.type.document.yml'))->save();
      FieldStorageConfig::create(Yaml::parseFile($directory . 'field.storage.media.field_media_document.yml'))->save();
      FieldConfig::create(Yaml::parseFile($directory . 'field.field.media.document.field_media_document.yml'))->save();
      EntityViewDisplay::create(Yaml::parseFile($directory . 'core.entity_view_display.media.document.default.yml'))->save();
    }
    $files = \Drupal::service('file.repository');
    $image_file = $files->writeData(file_get_contents(DRUPAL_ROOT . '/core/tests/fixtures/files/image-1.png'), 'public://notice-image.png');
    $pdf_file = $files->writeData("%PDF-1.4\n% Notice attachment fixture\n%%EOF", 'public://notice-document.pdf');
    $image = \Drupal\media\Entity\Media::create([
      'bundle' => 'image', 'name' => 'Notice flag', 'status' => 1,
      'field_media_image' => ['target_id' => $image_file->id(), 'alt' => 'Flag for the holiday notice'],
    ]);
    $image->save();
    $pdf = \Drupal\media\Entity\Media::create([
      'bundle' => 'document', 'name' => 'Holiday document', 'status' => 1,
      'field_media_document' => ['target_id' => $pdf_file->id()],
    ]);
    $pdf->save();
    $notice = $this->notice('Holiday with attachments', '2099-12-31');
    $notice->set('field_featured_image', $image->id())->set('field_documents', [$pdf->id()])->save();
    $assert = $this->assertSession();
    $this->drupalGet('<front>');
    $panel = '#official-update-' . $notice->id();
    $assert->elementExists('css', $panel . ' .official-board__media img[alt="Flag for the holiday notice"]');
    $assert->elementExists('css', $panel . ' a[href$="notice-document.pdf"]');
    $this->drupalGet($notice->toUrl());
    $assert->elementExists('css', '.public-notice-page img[alt="Flag for the holiday notice"]');
    $assert->elementExists('css', '.public-notice-page a[href$="notice-document.pdf"]');
    // Private/draft media must not leak onto the anonymously cached board.
    $image->setUnpublished()->save();
    $pdf->setUnpublished()->save();
    $this->drupalGet('<front>');
    $assert->elementNotExists('css', $panel . ' .official-board__media');
    $assert->elementNotExists('css', $panel . ' a[href$="notice-document.pdf"]');
  }

  public function testExpiryAndUrgentPriority(): void {
    $today = \Drupal::service('date.formatter')->format(time(), 'custom', 'Y-m-d');
    $yesterday = date('Y-m-d', strtotime($today . ' -1 day'));
    $this->notice('Expired announcement', $yesterday, TRUE);
    $urgent = $this->notice('Urgent announcement', $today, TRUE);
    $this->notice('Ordinary announcement', $today);
    $this->update('Latest featured news');
    $this->drupalGet('<front>');
    $assert = $this->assertSession();
    $assert->elementTextNotContains('css', '[data-official-board]', 'Expired announcement');
    $assert->elementTextContains('css', '[data-official-board]', 'Ordinary announcement');
    $assert->elementTextContains('css', '[data-board-panel]:first-child', 'Urgent announcement');
    $assert->elementExists('css', '#official-update-' . $urgent->id());
  }

  public function testHeadingCanBeEditedInAdmin(): void {
    $today = \Drupal::service('date.formatter')->format(time(), 'custom', 'Y-m-d');
    $this->notice('Homepage heading test announcement', $today);
    // Warm the public cache before editing so this also checks invalidation.
    $this->drupalGet('<front>');
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->elementTextEquals('css', '#official-updates-title', 'Official updates');
    $editor = $this->drupalCreateUser(['access content', 'edit any homepage content']);
    $this->drupalLogin($editor);
    $this->drupalGet('node/' . $this->homepage->id() . '/edit');
    $this->assertSession()->pageTextContains('Official updates board');
    $this->assertSession()->fieldExists('Official updates section heading');
    $this->submitForm(['field_notices_heading[0][value]' => 'Updates from our office'], 'Save');
    $this->drupalLogout();
    $this->drupalGet('<front>');
    $this->assertSession()->elementTextEquals('css', '#official-updates-title', 'Updates from our office');
  }

  public function testArticleAndRelatedLinks(): void {
    $news = $this->update('Linked news');
    $release = $this->update('Linked press release', category: 'Press release');
    $today = date('Y-m-d');
    $notice = $this->notice('Linked announcement', $today);
    $general = Term::create(['vid' => 'notice_category', 'name' => 'Procurement']);
    $general->save();
    $related = $this->notice('Related-information notice', $today);
    $related->set('field_notice_category', $general->id())
      ->set('field_notice_link', ['uri' => 'entity:node/' . $news->id()])->save();
    $this->drupalGet('<front>');
    $assert = $this->assertSession();
    foreach ([$news, $release, $notice] as $node) {
      $this->drupalGet('<front>');
      $assert->elementAttributeContains('css', '#official-update-' . $node->id() . ' .official-board__read', 'href', '/node/' . $node->id());
      $this->drupalGet($node->toUrl());
      $assert->statusCodeEquals(200);
      $assert->pageTextContains($node->label());
    }
    $this->drupalGet('<front>');
    $assert->elementAttributeContains('css', '#official-update-' . $related->id() . ' .official-board__read', 'href', '/node/' . $news->id());
    foreach ([$news, $release] as $node) {
      $this->drupalGet($node->toUrl());
      $assert->linkExists($node === $news ? 'All news' : 'All press releases');
    }
  }

}
