<?php

namespace Drupal\ob_site;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\views\Views;

/**
 * Selects up to five accessible Gazette publications with public PDF files.
 */
final class HomepageGazettes {

  public static function build(): array {
    $cache = (new CacheableMetadata())
      ->addCacheTags(['node_list:publication', 'media_list', 'config:views.view.resource_library'])
      ->addCacheContexts(['user.permissions', 'user.node_grants:view', 'languages:language_content', 'languages:language_interface']);
    $view = Views::getView('resource_library');
    $items = [];
    if (!$view || !$view->setDisplay('page_gazettes')) {
      return ['items' => [], 'cache' => $cache];
    }
    $filters = $view->display_handler->getOption('filters');
    $sections = $filters['field_resource_section_target_id']['value'] ?? [];
    if (!$sections) {
      return ['items' => [], 'cache' => $cache];
    }
    $storage = \Drupal::entityTypeManager()->getStorage('node');
    $ids = $storage->getQuery()->accessCheck(TRUE)->condition('type', 'publication')
      ->condition('status', 1)->condition('field_resource_section.target_id', array_values($sections), 'IN')->execute();
    $nodes = $storage->loadMultiple($ids);
    // Use publication date where supplied, creation date otherwise.
    usort($nodes, static function ($a, $b): int {
      $date = static fn($n): string => $n->get('field_publication_date')->value ?: gmdate('Y-m-d', $n->getCreatedTime());
      return [$date($b), $b->getCreatedTime(), (int) $b->id()] <=> [$date($a), $a->getCreatedTime(), (int) $a->id()];
    });
    foreach ($nodes as $node) {
      $node = \Drupal::service('entity.repository')->getTranslationFromContext($node);
      $cache->addCacheableDependency($node);
      $access = $node->access('view', NULL, TRUE)->andIf($node->get('field_documents')->access('view', NULL, TRUE));
      $cache->addCacheableDependency($access);
      if (!$access->isAllowed()) {
        continue;
      }
      foreach ($node->get('field_documents')->referencedEntities() as $media) {
        $media = \Drupal::service('entity.repository')->getTranslationFromContext($media);
        $cache->addCacheableDependency($media);
        $source_field = $media->getSource()->getConfiguration()['source_field'] ?? NULL;
        if (!$source_field) {
          continue;
        }
        $field = $media->get($source_field);
        $access = $media->access('view', NULL, TRUE)->andIf($field->access('view', NULL, TRUE));
        $cache->addCacheableDependency($access);
        $file = $field->entity;
        if (!$media->isPublished() || !$access->isAllowed() || !$file) {
          continue;
        }
        $cache->addCacheableDependency($file);
        if (!str_starts_with($file->getFileUri(), 'public://') || strtolower(pathinfo($file->getFilename(), PATHINFO_EXTENSION)) !== 'pdf') {
          continue;
        }
        $date = $node->get('field_publication_date')->value;
        $items[] = [
          'title' => $node->label(),
          'reference' => $node->get('field_reference_number')->value,
          'date' => $date ? \Drupal::service('date.formatter')->format(strtotime($date . ' UTC'), 'custom', 'j F Y', 'UTC') : '',
          'datetime' => $date,
          'url' => $node->toUrl()->toString(),
          'pdf' => \Drupal::service('file_url_generator')->generateString($file->getFileUri()),
        ];
        break;
      }
      if (count($items) === 5) {
        break;
      }
    }
    return ['items' => $items, 'cache' => $cache];
  }

}
