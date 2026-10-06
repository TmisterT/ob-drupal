<?php

/**
 * Integration checks using a temporary release, removed even on failure.
 */

use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;
use Drupal\Core\Session\AnonymousUserSession;
use Drupal\Core\Cache\CacheableMetadata;
use Drupal\views\Views;

require_once DRUPAL_ROOT . '/themes/custom/ob/includes/content.theme';
$check = static function (bool $passed, string $message): void {
  if (!$passed) {
    throw new RuntimeException($message);
  }
  echo "PASS: $message\n";
};
$fetch = static function (string $path): string {
  $response = \Drupal::httpClient()->get('http://localhost' . $path, ['http_errors' => FALSE]);
  if ($response->getStatusCode() !== 200) {
    throw new RuntimeException("HTTP " . $response->getStatusCode() . " for $path");
  }
  // Each admin save normally runs in a separate PHP request. Reset Drush's
  // request-local invalidation bookkeeping between simulated requests too.
  \Drupal::service('cache_tags.invalidator.checksum')->reset();
  return (string) $response->getBody();
};
$storage = \Drupal::entityTypeManager()->getStorage('node');
$node = NULL;
$editor_account = NULL;
try {
  $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadByProperties(['vid' => 'update_type', 'name' => 'Press release']);
  if (!$terms) {
    $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadByProperties(['vid' => 'update_type', 'name' => 'Press releases']);
  }
  $check((bool) $terms, 'Press release category exists');
  $node = Node::create([
    'type' => 'update', 'langcode' => 'en', 'title' => 'Bilingual verification English 86721',
    'uid' => 1, 'body' => ['value' => '<p>English verification body 86721</p>', 'format' => 'basic_html'],
    'field_summary' => 'English verification summary 86721',
    'field_update_type' => ['target_id' => reset($terms)->id()],
    'field_update_date' => '2026-10-02', 'moderation_state' => 'published',
  ]);
  $node->save();
  $id = $node->id();
  $editor_account = User::create([
    'name' => 'bilingual-verification-' . $id,
    'mail' => 'bilingual-verification-' . $id . '@example.invalid',
    'status' => 1, 'roles' => ['content_editor'],
    'pass' => bin2hex(random_bytes(24)),
  ]);
  $editor_account->save();
  $cookies = new \GuzzleHttp\Cookie\CookieJar();
  $login = \Drupal::service(\Drupal\user\OneTimeAuthentication::class)->generateOneTimeLoginUrl($editor_account, [], TRUE);
  \Drupal::httpClient()->get('http://localhost' . parse_url($login->toString(), PHP_URL_PATH), ['cookies' => $cookies]);
  $admin_fetch = static function (string $path) use ($cookies): string {
    $response = \Drupal::httpClient()->get('http://localhost' . $path, ['cookies' => $cookies, 'http_errors' => FALSE]);
    if ($response->getStatusCode() !== 200) {
      throw new RuntimeException('Editor page failed: ' . $path . ' HTTP ' . $response->getStatusCode());
    }
    return (string) $response->getBody();
  };
  $html = $admin_fetch('/node/add/update');
  $check(str_contains($html, 'name="langcode[0][value]"'), 'Editor create form has a language selector');
  $check(str_contains($html, 'Release documents'), 'Editor create form has release attachments');
  $check((bool) preg_match('/<option value="draft" selected="selected">/', $html), 'New articles default to Draft');
  $html = $admin_fetch('/node/' . $id . '/translations');
  $check(str_contains($html, 'Kiribati') && str_contains($html, '/translations/add/en/gil'), 'Editor Translate tab offers Kiribati');
  $html = $admin_fetch('/node/' . $id . '/translations/add/en/gil');
  $check(str_contains($html, 'Release documents') && str_contains($html, 'name="title[0][value]"'), 'Editor can open translated title and documents form');
  $check(!str_contains($html, 'name="field_update_date[0][value][date]"'), 'Shared release date is hidden on translation form');
  $check((bool) preg_match('/<option value="draft" selected="selected">/', $html), 'New translations default to Draft');
  $translation = $node->addTranslation('gil', [
    'title' => 'Bilingual verification Kiribati 86721',
    'body' => ['value' => '<p>Kiribati verification body 86721</p>', 'format' => 'basic_html'],
    'field_summary' => 'Kiribati verification summary 86721',
    'moderation_state' => 'draft',
  ]);
  $translation->setNewRevision(TRUE);
  $translation->save();
  $storage->resetCache([$id]);
  $node = $storage->load($id);
  $check($node->isPublished(), 'English remains published while Kiribati is draft');
  $html = $fetch('/node/' . $id);
  $check(str_contains($html, 'English verification body 86721'), 'English article renders');
  $check(!str_contains($html, 'hreflang="gil"'), 'Draft translation has no public language link');
  $check(!str_contains($html, 'Kiribati verification body 86721'), 'Draft text is absent from English page');

  // The pending Kiribati revision is not necessarily the default revision.
  $revision_id = $storage->getLatestRevisionId($id);
  $latest = $storage->loadRevision($revision_id);
  $translation = $latest->getTranslation('gil');
  $translation->set('moderation_state', 'published');
  $translation->setNewRevision(TRUE);
  $translation->save();
  $storage->resetCache([$id]);
  $node = $storage->load($id);
  $check($node->getTranslation('gil')->isPublished(), 'Kiribati publishes independently');
  $html = $fetch('/gil/node/' . $id);
  $check(str_contains($html, 'Kiribati verification body 86721'), 'Kiribati URL renders translated body');
  $check(str_contains($html, 'Bilingual verification Kiribati 86721'), 'Kiribati URL renders translated title');
  $check(str_contains($html, 'Kiribati verification summary 86721'), 'Kiribati URL renders translated summary');
  $check(str_contains($html, 'hreflang="en"') && str_contains($html, 'hreflang="gil"'), 'Both published languages have public links');
  $check((bool) preg_match('/hreflang="gil"[^>]*aria-current="page"/', $html), 'Current language is marked accessibly');
  $html = $fetch('/node/' . $id);
  $check(str_contains($html, 'English verification body 86721') && !str_contains($html, 'Kiribati verification body 86721'), 'English content stays separate after translation publishes');

  foreach (['/news-media/press-releases', '/gil/news-media/press-releases'] as $path) {
    $html = $fetch($path);
    $check(substr_count($html, 'class="press-release-table__title" href="' . ($path[1] === 'g' ? '/gil' : '') . '/node/' . $id . '"') === 1, "$path lists the release exactly once");
    if (str_starts_with($path, '/gil/')) {
      $check(str_contains($html, 'Bilingual verification Kiribati 86721'), 'Kiribati archive displays translated titles');
    }
  }
  $html = $fetch('/news-media/press-releases?search=' . rawurlencode('Bilingual verification Kiribati 86721'));
  $check(str_contains($html, 'class="press-release-table__title"'), 'Archive search matches a published Kiribati title');
  $html = $fetch('/news-media/press-releases?search=' . rawurlencode('Bilingual verification English 86721'));
  $check(str_contains($html, 'class="press-release-table__title"'), 'Archive search matches a published English title');
  $translation = $node->getTranslation('gil');
  $translation->set('body', ['value' => '<p>Private revised Kiribati 86721</p>', 'format' => 'basic_html']);
  $translation->set('moderation_state', 'draft');
  $translation->setNewRevision(TRUE);
  $translation->save();
  $html = $fetch('/gil/node/' . $id);
  $check(str_contains($html, 'Kiribati verification body 86721') && !str_contains($html, 'Private revised Kiribati 86721'), 'New translation draft leaves the published version visible');

  // Archive the original while retaining a published translated version.
  $storage->resetCache([$id]);
  $node = $storage->load($id);
  $node->set('moderation_state', 'archived');
  $node->setNewRevision(TRUE);
  $node->save();
  $storage->resetCache([$id]);
  $node = $storage->load($id);
  $check(!$node->isPublished() && $node->getTranslation('gil')->isPublished(), 'Archiving English preserves the published Kiribati translation');
  $html = $fetch('/news-media/press-releases?search=' . rawurlencode('Bilingual verification Kiribati 86721'));
  $check(str_contains($html, 'Bilingual verification Kiribati 86721') && str_contains($html, 'class="press-release-table__title"'), 'Published Kiribati release stays listed when English is archived');
  $check(!str_contains($html, 'href="/node/' . $id . '" hreflang="en"'), 'Archived English version is absent from public language links');

  $editor = User::create(['name' => 'verification-editor', 'roles' => ['content_editor']]);
  $check($editor->hasPermission('translate update node') && $editor->hasPermission('edit any update content'), 'Content editors can edit and translate updates');
  $check($editor->hasPermission('use updates_editorial transition publish'), 'Content editors can publish approved versions');
  $check((bool) \Drupal::config('views.view.content')->get('display.default.display_options.fields.langcode'), 'Admin content list includes Language');
  $check(\Drupal::config('language.negotiation')->get('url.prefixes.en') === '', 'English URLs retain their existing paths');
}
finally {
  if ($node && $node->id()) {
    $storage->resetCache([$node->id()]);
    $storage->load($node->id())?->delete();
    echo "Temporary verification release removed.\n";
  }
  $editor_account?->delete();
}
