<?php

namespace Drupal\Tests\ob_site\Kernel;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\filter\Entity\FilterFormat;
use Drupal\KernelTests\KernelTestBase;
use Drupal\node\Entity\Node;
use Drupal\node\Entity\NodeType;
use Drupal\taxonomy\Entity\Term;
use Drupal\taxonomy\Entity\Vocabulary;
use PHPUnit\Framework\Attributes\Group;

/**
 * Covers clean summaries, editorial classification and safe excerpts.
 */
#[Group('ob_site')]
final class SearchResultPresentationTest extends KernelTestBase {

  protected static $modules = ['system', 'user', 'field', 'text', 'filter', 'node', 'taxonomy', 'search', 'search_node'];

  protected function setUp(): void {
    parent::setUp();
    $this->installEntitySchema('user');
    $this->installEntitySchema('node');
    $this->installEntitySchema('taxonomy_term');
    $this->installConfig(['system', 'filter', 'search']);
    \Drupal\user\Entity\Role::create(['id' => 'anonymous', 'label' => 'Anonymous user', 'permissions' => ['access content']])->save();
    require_once DRUPAL_ROOT . '/themes/custom/ob/includes/search.theme';
    foreach (['service', 'publication', 'update', 'basic_page'] as $type) {
      NodeType::create(['type' => $type, 'name' => $type])->save();
    }
    foreach (['field_summary' => 'string_long', 'body' => 'text_with_summary'] as $name => $type) {
      FieldStorageConfig::create(['field_name' => $name, 'entity_type' => 'node', 'type' => $type])->save();
      foreach (['service', 'publication', 'update', 'basic_page'] as $bundle) {
        FieldConfig::create(['field_name' => $name, 'entity_type' => 'node', 'bundle' => $bundle, 'label' => $name])->save();
      }
    }
    FilterFormat::create([
      'format' => 'search_html', 'name' => 'Search HTML',
      'filters' => ['filter_html' => ['status' => TRUE, 'settings' => ['allowed_html' => '<p> <h2> <strong> <br>']]],
    ])->save();
    foreach (['publication' => 'publication_type', 'update' => 'update_type'] as $bundle => $vid) {
      Vocabulary::create(['vid' => $vid, 'name' => $vid])->save();
      $name = 'field_' . $vid;
      FieldStorageConfig::create(['field_name' => $name, 'entity_type' => 'node', 'type' => 'entity_reference', 'settings' => ['target_type' => 'taxonomy_term']])->save();
      FieldConfig::create(['field_name' => $name, 'entity_type' => 'node', 'bundle' => $bundle, 'label' => $name])->save();
    }
  }

  public function testEditorialSummaryAndBodyFallback(): void {
    $node = Node::create([
      'type' => 'service', 'title' => 'Permit',
      'field_summary' => "  A clean\n application\u{00A0}summary. ",
      'body' => ['value' => '<h2>Layout heading</h2><p>Body content</p>', 'format' => 'search_html'],
    ]);
    $this->assertSame('A clean application summary.', _ob_search_summary($node, new CacheableMetadata()));
    $node->set('field_summary', '');
    $this->assertSame('Layout heading Body content', _ob_search_summary($node, new CacheableMetadata()));
    $node->get('body')->summary = '<p>Purpose-built body summary.</p>';
    $this->assertSame('Purpose-built body summary.', _ob_search_summary($node, new CacheableMetadata()));
  }

  public function testClassificationAndEscaping(): void {
    foreach (['publication' => ['publication_type', 'Application Form'], 'update' => ['update_type', 'Press release']] as $bundle => [$vid, $label]) {
      $term = Term::create(['vid' => $vid, 'name' => $label]);
      $term->save();
      $node = Node::create(['type' => $bundle, 'title' => 'Result', 'field_' . $vid => $term->id(), 'field_summary' => 'Apply for a permit.']);
      $variables = ['result' => ['node' => $node], 'snippet' => ['#plain_text' => 'Old layout snippet']];
      ob_preprocess_search_result($variables);
      $this->assertSame($label, $variables['result_type']);
      $this->assertContains('taxonomy_term:' . $term->id(), $variables['search_result_metadata']['#cache']['tags']);
      $this->assertContains('url.query_args:keys', $variables['search_result_metadata']['#cache']['contexts']);
      $this->assertStringNotContainsString('Old layout', json_encode($variables['snippet']));
    }
    \Drupal::request()->query->set('keys', 'permit');
    $node = Node::create(['type' => 'service', 'title' => 'Permit', 'field_summary' => 'Get a permit. <script>alert(1)</script>']);
    $variables = ['result' => ['node' => $node]];
    ob_preprocess_search_result($variables);
    $this->assertSame('Service', (string) $variables['result_type']);
    $rendered = (string) \Drupal::service('renderer')->renderInIsolation($variables['snippet']);
    $this->assertStringContainsString('<strong>permit</strong>', $rendered);
    $this->assertStringNotContainsString('<script>', $rendered);
    $this->assertStringContainsString('&lt;script&gt;', $rendered);
    $node->set('field_summary', '');
    $variables = ['result' => ['node' => $node], 'snippet' => ['#plain_text' => 'Layout clutter']];
    ob_preprocess_search_result($variables);
    $this->assertSame([], $variables['snippet']);
  }

}
