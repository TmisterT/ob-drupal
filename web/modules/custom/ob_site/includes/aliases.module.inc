<?php

/**
 * @file
 * Title-based aliases for editorial publications and official updates.
 */

/**
 * Implements hook_node_insert().
 */
function ob_site_node_insert(\Drupal\node\NodeInterface $node): void {
  ob_site_ensure_editorial_aliases($node);
}

/**
 * Implements hook_node_update().
 */
function ob_site_node_update(\Drupal\node\NodeInterface $node): void {
  ob_site_ensure_editorial_aliases($node);
}

/**
 * Adds missing aliases, retaining existing URLs and manual editorial choices.
 */
function ob_site_ensure_editorial_aliases(\Drupal\node\NodeInterface $node): void {
  if (!in_array($node->bundle(), ['publication', 'update'], TRUE)
    || !$node->isDefaultRevision() || !\Drupal::moduleHandler()->moduleExists('path_alias')) {
    return;
  }
  $storage = \Drupal::entityTypeManager()->getStorage('path_alias');
  $path = '/node/' . $node->id();
  foreach ($node->getTranslationLanguages() as $langcode => $language) {
    $translation = $node->getTranslation($langcode);
    if ($storage->getQuery()->accessCheck(FALSE)->condition('path', $path)
      ->condition('langcode', [$langcode, 'und'], 'IN')->count()->execute()) {
      continue;
    }
    $prefix = '/resources/publications';
    if ($node->bundle() === 'publication' && $translation->hasField('field_resource_section')) {
      $sections = [
        'Gazettes & Instruments' => '/resources/gazettes',
        'Information Library' => '/resources/information-library',
        'Forms, Permits & Applications' => '/resources/forms',
      ];
      foreach ($translation->get('field_resource_section')->referencedEntities() as $section) {
        if (isset($sections[$section->getUntranslated()->label()])) {
          $prefix = $sections[$section->getUntranslated()->label()];
          break;
        }
      }
    }
    elseif ($node->bundle() === 'update') {
      $prefix = '/news-media/news';
      if ($translation->hasField('field_update_type')) {
        foreach ($translation->get('field_update_type')->referencedEntities() as $type) {
          if ($type->uuid() === 'c976e83d-4542-4999-bddf-ac5fbed43e66' || $type->getUntranslated()->label() === 'Press release') {
            $prefix = '/news-media/press-releases';
            break;
          }
        }
      }
    }
    $title = \Drupal::transliteration()->transliterate($translation->label(), $langcode, '-');
    $slug = trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($title)), '-');
    $base = $prefix . '/' . (substr($slug, 0, 180) ?: 'document-' . $node->id());
    $alias = $base;
    $suffix = 2;
    // Check all languages so links remain unambiguous across translations.
    while ($storage->getQuery()->accessCheck(FALSE)->condition('alias', $alias)->count()->execute()) {
      $alias = $base . '-' . $suffix++;
    }
    $record = $storage->create(['path' => $path, 'alias' => $alias, 'langcode' => $langcode]);
    $record->save();
    // Keep the computed path field consistent for another save of this object.
    if ($translation->hasField('path')) {
      $translation->set('path', ['alias' => $alias, 'pid' => $record->id(), 'langcode' => $langcode]);
    }
  }
}
