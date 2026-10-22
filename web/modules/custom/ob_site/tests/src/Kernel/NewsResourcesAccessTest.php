<?php

namespace Drupal\Tests\ob_site\Kernel;

use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\KernelTests\KernelTestBase;
use Drupal\node\Entity\Node;
use Drupal\node\Entity\NodeType;
use Drupal\taxonomy\Entity\Term;
use Drupal\taxonomy\Entity\Vocabulary;
use Drupal\user\Entity\Role;
use Drupal\user\Entity\User;
use PHPUnit\Framework\Attributes\Group;

/**
 * Checks actual access decisions and save validation for scoped publishers.
 */
#[Group('ob_site')]
final class NewsResourcesAccessTest extends KernelTestBase {

  protected static $modules = ['system', 'user', 'field', 'text', 'filter', 'node', 'taxonomy', 'ob_site'];

  protected function setUp(): void {
    parent::setUp();
    $this->installEntitySchema('user');
    $this->installEntitySchema('node');
    $this->installEntitySchema('taxonomy_term');
    $this->installSchema('node', ['node_access']);
    $this->installConfig(['system', 'filter']);
    foreach (['update', 'publication', 'public_notice', 'service'] as $type) {
      NodeType::create(['type' => $type, 'name' => $type])->save();
    }
    Vocabulary::create(['vid' => 'resource_section', 'name' => 'Resource section'])->save();
    FieldStorageConfig::create(['field_name' => 'field_resource_section', 'entity_type' => 'node', 'type' => 'entity_reference', 'settings' => ['target_type' => 'taxonomy_term']])->save();
    FieldConfig::create(['field_name' => 'field_resource_section', 'entity_type' => 'node', 'bundle' => 'publication', 'label' => 'Resource section'])->save();
    // Reserve uid 1: Drupal gives that account special administrative access.
    User::create(['name' => 'root', 'status' => 1])->save();
    Role::create(['id' => 'scoped', 'label' => 'Scoped', 'permissions' => [
      'access content', 'manage news and selected resources',
      'create publication content', 'edit any publication content',
      'edit any update content', 'edit any public_notice content',
      'administer node published status',
    ]])->save();
    $account = User::create(['name' => 'publisher', 'status' => 1, 'roles' => ['scoped']]);
    $account->save();
    \Drupal::currentUser()->setAccount($account);
  }

  public function testSectionBoundariesAndValidation(): void {
    foreach (['Gazettes & Instruments' => TRUE, 'Information Library' => TRUE, 'Forms, Permits & Applications' => FALSE, 'Commission Reports' => FALSE] as $name => $allowed) {
      $term = Term::create(['vid' => 'resource_section', 'name' => $name]);
      $term->save();
      $node = Node::create(['type' => 'publication', 'title' => $name, 'status' => 1, 'field_resource_section' => $term->id()]);
      $this->assertSame($allowed, $node->access('update'));
      $violations = $node->validate()->getByField('field_resource_section');
      $this->assertSame($allowed ? 0 : 1, count($violations));
      if ($allowed) {
        $node->save();
        $this->assertTrue($node->isPublished());
      }
      else {
        try {
          $node->save();
          $this->fail('An out-of-scope save must be rejected.');
        }
        catch (\Drupal\Core\Entity\EntityStorageException $exception) {
          $this->assertStringContainsString('This account can save only', $exception->getMessage());
        }
      }
    }
    foreach (['update', 'public_notice'] as $type) {
      $node = Node::create(['type' => $type, 'title' => $type, 'status' => 0]);
      $this->assertTrue($node->access('update'));
      $this->assertTrue($node->access('view'));
      $node->setPublished()->save();
    }
    $service = Node::create(['type' => 'service', 'title' => 'Restricted', 'status' => 0]);
    $this->assertFalse($service->access('update'));
    $this->assertFalse($service->access('view'));
    $publication = Node::create(['type' => 'publication', 'title' => 'Unclassified']);
    $this->assertFalse($publication->access('update'));
    $this->assertCount(1, $publication->validate()->getByField('field_resource_section'));
    // Public browsing is unchanged.
    $service->setPublished();
    \Drupal::entityTypeManager()->getAccessControlHandler('node')->resetCache();
    $this->assertTrue($service->access('view'));
    // An ordinary administrator remains exempt from the scoped policy.
    $admin = User::load(1);
    $this->assertTrue($service->access('update', $admin));
  }

}
