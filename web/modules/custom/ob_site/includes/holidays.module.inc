<?php

/**
 * @file
 * Retires old holiday notices after their annual replacement is published.
 */

/**
 * Keeps the annual schedule as the published source for its year.
 */
function ob_site_retire_replaced_holiday_notices(\Drupal\node\NodeInterface $schedule): void {
  if ($schedule->bundle() !== 'annual_holidays' || !$schedule->isDefaultRevision() || !$schedule->isPublished()) {
    return;
  }
  $year = (string) $schedule->get('field_holiday_year')->value;
  $storage = \Drupal::entityTypeManager()->getStorage('node');
  $ids = $storage->getQuery()->accessCheck(FALSE)->condition('type', 'public_notice')
    ->condition('status', 1)->condition('title', $year, 'CONTAINS')->execute();
  foreach ($storage->loadMultiple($ids) as $notice) {
    if (!$notice->hasField('field_notice_category') || !preg_match('/(?<!\d)' . preg_quote($year, '/') . '(?!\d)/', $notice->label())) {
      continue;
    }
    foreach ($notice->get('field_notice_category')->referencedEntities() as $category) {
      if (in_array(strtolower(trim($category->getUntranslated()->label())), ['public holiday', 'public holidays'], TRUE)) {
        foreach ($notice->getTranslationLanguages() as $langcode => $language) {
          $notice->getTranslation($langcode)->setUnpublished();
        }
        $notice->setNewRevision(TRUE);
        $notice->setRevisionLogMessage('Replaced by the published annual public holiday schedule for ' . $year . '.');
        $notice->save();
        break;
      }
    }
  }
}

/**
 * Classifies annual schedules as Public Holiday in the Public Notices archive.
 */
function ob_site_assign_holiday_category(\Drupal\node\NodeInterface $node): void {
  if ($node->bundle() !== 'annual_holidays' || !$node->hasField('field_notice_category')) {
    return;
  }
  $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadByProperties(['vid' => 'notice_category']);
  foreach ($terms as $term) {
    if (in_array(strtolower(trim($term->label())), ['public holiday', 'public holidays'], TRUE)) {
      $node->set('field_notice_category', $term->id());
      break;
    }
  }
}
