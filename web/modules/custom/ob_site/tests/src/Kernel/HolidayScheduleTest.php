<?php

namespace Drupal\Tests\ob_site\Kernel;

use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\file\Entity\File;
use Drupal\KernelTests\KernelTestBase;
use Drupal\media\Entity\Media;
use Drupal\media\Entity\MediaType;
use Drupal\node\Entity\Node;
use Drupal\ob_site\HolidayArchive;
use Drupal\user\Entity\User;
use PHPUnit\Framework\Attributes\Group;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tests annual holiday editing, publication checks and filtered public output.
 */
#[Group('ob_site')]
final class HolidayScheduleTest extends KernelTestBase {

  protected static $modules = ['system', 'user', 'field', 'text', 'filter', 'node', 'file', 'image', 'media', 'media_library', 'views', 'path_alias', 'path', 'taxonomy', 'ob_site'];

  protected function setUp(): void {
    parent::setUp();
    foreach (['user', 'node', 'file', 'media', 'path_alias'] as $type) {
      $this->installEntitySchema($type);
    }
    $this->installSchema('node', ['node_access']);
    $this->installSchema('file', ['file_usage']);
    $this->installConfig(['system', 'filter', 'file', 'media', 'path_alias']);
    MediaType::create(['id' => 'document', 'label' => 'Document', 'source' => 'file', 'source_configuration' => ['source_field' => 'field_media_document']])->save();
    FieldStorageConfig::create(['entity_type' => 'media', 'field_name' => 'field_media_document', 'type' => 'file', 'settings' => ['uri_scheme' => 'public']])->save();
    FieldConfig::create(['entity_type' => 'media', 'bundle' => 'document', 'field_name' => 'field_media_document', 'label' => 'File', 'settings' => ['file_extensions' => 'pdf']])->save();
    $this->container->get('module_handler')->loadInclude('ob_site', 'install');
    ob_site_update_11048();
    $user = User::create(['name' => 'root', 'status' => 1]);
    $user->save();
    $this->container->get('current_user')->setAccount($user);
    $this->container->get('router.builder')->rebuild();
  }

  private function officialDocument(): Media {
    $file = File::create(['uri' => 'public://official-holidays.pdf', 'filename' => 'official-holidays.pdf', 'filesize' => 100, 'status' => 1]);
    $file->save();
    $media = Media::create(['bundle' => 'document', 'name' => 'Official annual notice', 'status' => 1, 'field_media_document' => $file->id()]);
    $media->save();
    return $media;
  }

  public function testValidationAndPublicArchive(): void {
    $node = Node::create(['type' => 'annual_holidays', 'title' => 'National Public Holidays 2026', 'field_holiday_year' => 2026, 'status' => 0]);
    $this->assertCount(0, $node->validate());
    $node->setPublished();
    $this->assertCount(2, $node->validate());
    $node->set('field_holiday_entries', [['date' => '2026-02-30', 'title' => 'Invalid date']]);
    $this->assertGreaterThan(0, $node->validate()->getByField('field_holiday_entries')->count());
    $node->set('field_holiday_entries', [['date' => '2027-01-01', 'title' => 'Wrong year']]);
    $this->assertGreaterThan(0, $node->validate()->getByField('field_holiday_entries')->count());
    $node->set('field_holiday_entries', [['date' => '2026-01-01', 'title' => '', 'description' => 'Needs title']]);
    $this->assertGreaterThan(0, $node->validate()->getByField('field_holiday_entries')->count());
    $document = $this->officialDocument();
    $node->set('field_documents', $document->id());
    $node->set('field_holiday_entries', [
      ['date' => '2026-12-25', 'title' => 'December holiday', 'description' => 'Optional detail'],
      ['date' => '2026-01-01', 'title' => 'January holiday'],
    ]);
    $this->assertCount(0, $node->validate());
    $node->save();
    $duplicate = Node::create(['type' => 'annual_holidays', 'title' => 'Duplicate', 'field_holiday_year' => 2026, 'status' => 0]);
    $this->assertGreaterThan(0, $duplicate->validate()->getByField('field_holiday_year')->count());
    $draft = Node::create(['type' => 'annual_holidays', 'title' => 'Draft 2027', 'field_holiday_year' => 2027, 'status' => 0, 'field_holiday_entries' => [['date' => '2027-01-01', 'title' => 'Draft holiday']]]);
    $draft->save();

    $this->container->get('request_stack')->push(Request::create('/news-media/public-holidays?year=2026'));
    $build = HolidayArchive::build();
    $this->assertSame(['January holiday', 'December holiday'], array_column($build['#rows'], 'title'));
    $this->assertCount(1, $build['#documents']);
    $this->assertNotContains(2027, $build['#years']);
    $this->assertContains('url.query_args:search', $build['#cache']['contexts']);
    $this->assertContains('node_list:annual_holidays', $build['#cache']['tags']);
    $this->container->get('request_stack')->pop();

    $this->container->get('request_stack')->push(Request::create('/news-media/public-holidays?year=2026&search=jAnUaRy'));
    $build = HolidayArchive::build();
    $this->assertCount(1, $build['#rows']);
    $this->assertCount(1, $build['#documents']);
    $this->container->get('request_stack')->pop();
    $this->container->get('request_stack')->push(Request::create('/news-media/public-holidays?year=2027'));
    $this->assertFalse(HolidayArchive::build()['#has_schedule']);
    $this->container->get('request_stack')->pop();
    $document->setUnpublished()->save();
    $this->container->get('request_stack')->push(Request::create('/news-media/public-holidays?year=2026'));
    $this->assertSame([], HolidayArchive::build()['#documents']);
    $this->container->get('request_stack')->pop();
  }

}
