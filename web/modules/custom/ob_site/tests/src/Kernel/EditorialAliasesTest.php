<?php

namespace Drupal\Tests\ob_site\Kernel;

use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\KernelTests\KernelTestBase;
use Drupal\node\Entity\Node;
use Drupal\node\Entity\NodeType;
use Drupal\taxonomy\Entity\Term;
use Drupal\taxonomy\Entity\Vocabulary;
use PHPUnit\Framework\Attributes\Group;

/**
 * Checks generated editorial URLs and retention of existing links.
 */
#[Group('ob_site')]
final class EditorialAliasesTest extends KernelTestBase {

  protected static $modules = ['system', 'user', 'field', 'text', 'filter', 'node', 'taxonomy', 'path_alias', 'path', 'ob_site'];

  protected function setUp(): void {
    parent::setUp();
    foreach (['user', 'node', 'taxonomy_term', 'path_alias'] as $entity_type) {
      $this->installEntitySchema($entity_type);
    }
    $this->installSchema('node', ['node_access']);
    $this->installConfig(['system', 'filter', 'path_alias']);
    $this->container->get('router.builder')->rebuild();
    foreach (['publication', 'update'] as $bundle) {
      NodeType::create(['type' => $bundle, 'name' => $bundle])->save();
    }
    foreach (['resource_section' => 'publication', 'update_type' => 'update'] as $vocabulary => $bundle) {
      Vocabulary::create(['vid' => $vocabulary, 'name' => $vocabulary])->save();
      FieldStorageConfig::create(['field_name' => 'field_' . $vocabulary, 'entity_type' => 'node', 'type' => 'entity_reference', 'settings' => ['target_type' => 'taxonomy_term']])->save();
      FieldConfig::create(['field_name' => 'field_' . $vocabulary, 'entity_type' => 'node', 'bundle' => $bundle, 'label' => $vocabulary])->save();
    }
  }

  public function testGeneratedAndPreservedAliases(): void {
    $manager = $this->container->get('path_alias.manager');
    foreach ([
      ['publication', 'resource_section', 'Gazettes & Instruments', '/resources/gazettes'],
      ['publication', 'resource_section', 'Information Library', '/resources/information-library'],
      ['publication', 'resource_section', 'Forms, Permits & Applications', '/resources/forms'],
      ['update', 'update_type', 'Press release', '/news-media/press-releases'],
      ['update', 'update_type', 'News', '/news-media/news'],
    ] as [$bundle, $field, $name, $prefix]) {
      $term = Term::create(['vid' => $field, 'name' => $name]);
      $term->save();
      $values = ['type' => $bundle, 'title' => 'Official Report & Update!', 'langcode' => 'en', 'field_' . $field => $term->id()];
      $node = Node::create($values);
      $node->save();
      $path = '/node/' . $node->id();
      $aliases = \Drupal::entityTypeManager()->getStorage('path_alias')->loadByProperties(['path' => $path]);
      $this->assertNotEmpty($aliases, 'Alias created by node insert hook');
      $manager->cacheClear();
      $this->assertSame($prefix . '/official-report-update', $manager->getAliasByPath($path, 'en'));
      $duplicate = Node::create($values);
      $duplicate->save();
      $this->assertSame($prefix . '/official-report-update-2', $manager->getAliasByPath('/node/' . $duplicate->id(), 'en'));
      $node->setTitle('Renamed report')->save();
      $this->assertSame($prefix . '/official-report-update', $manager->getAliasByPath($path, 'en'));
      $manual = Node::create($values + ['path' => ['alias' => $prefix . '/chosen-by-editor']]);
      $manual->save();
      $this->assertSame($prefix . '/chosen-by-editor', $manager->getAliasByPath('/node/' . $manual->id(), 'en'));
    }
  }

}
