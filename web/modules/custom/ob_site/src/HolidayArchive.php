<?php

namespace Drupal\ob_site;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\StringTranslation\ByteSizeMarkup;

/**
 * Builds the same searchable annual schedule on new and legacy holiday pages.
 */
final class HolidayArchive {

  public static function build(?int $default_year = NULL): array {
    $args = \Drupal::request()->query->all();
    $holiday_now = (new \DateTimeImmutable('@' . \Drupal::time()->getRequestTime()))->setTimezone(new \DateTimeZone('Pacific/Tarawa'));
    $today = $holiday_now->format('Y-m-d');
    $current_year = (int) \Drupal::service('date.formatter')->format(\Drupal::time()->getRequestTime(), 'custom', 'Y');
    $year_input = $args['year'] ?? $default_year ?? $current_year;
    $year = is_scalar($year_input) && preg_match('/^\d{4}$/', (string) $year_input) && (int) $year_input >= 1900 && (int) $year_input <= 2200 ? (int) $year_input : $current_year;
    $search = isset($args['search']) && is_string($args['search']) ? mb_substr(trim($args['search']), 0, 200) : '';
    $cache = (new CacheableMetadata())->addCacheTags(['node_list:annual_holidays'])
      ->addCacheContexts(['url.query_args:year', 'url.query_args:search', 'url.path', 'user.permissions', 'user.node_grants:view', 'languages:language_content', 'timezone'])
      ->setCacheMaxAge(min(3600, $holiday_now->modify('tomorrow')->setTime(0, 0)->getTimestamp() - $holiday_now->getTimestamp()));
    $years = [$current_year => $current_year, $year => $year];
    $rows = [];
    $documents = [];
    $schedule = NULL;
    if (\Drupal\field\Entity\FieldStorageConfig::loadByName('node', 'field_holiday_year')) {
      $storage = \Drupal::entityTypeManager()->getStorage('node');
      $ids = $storage->getQuery()->accessCheck(TRUE)->condition('type', 'annual_holidays')->condition('status', 1)->sort('changed', 'DESC')->execute();
      foreach ($storage->loadMultiple($ids) as $node) {
        $node = \Drupal::service('entity.repository')->getTranslationFromContext($node);
        $cache->addCacheableDependency($node);
        $access = $node->access('view', NULL, TRUE);
        $cache->addCacheableDependency($access);
        if (!$access->isAllowed() || !$node->isPublished()) {
          continue;
        }
        $node_year = (int) $node->get('field_holiday_year')->value;
        $years[$node_year] = $node_year;
        if ($node_year === $year && !$schedule) {
          $schedule = $node;
        }
      }
    }
    if ($schedule) {
      foreach ($schedule->get('field_holiday_entries') as $item) {
        if ($item->isEmpty() || ($search !== '' && mb_stripos((string) $item->title, $search) === FALSE)) {
          continue;
        }
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/D', (string) $item->date)) {
          continue;
        }
        $date = \DateTimeImmutable::createFromFormat('!Y-m-d', (string) $item->date, new \DateTimeZone('UTC'));
        if (!$date || $date->format('Y-m-d') !== $item->date) {
          continue;
        }
        $end = preg_match('/^\d{4}-\d{2}-\d{2}$/D', (string) $item->end_date)
          ? \DateTimeImmutable::createFromFormat('!Y-m-d', (string) $item->end_date, new \DateTimeZone('UTC')) : FALSE;
        $has_range = $end && $end->format('Y-m-d') === $item->end_date && $end > $date;
        $formatter = \Drupal::service('date.formatter');
        $date_label = $has_range
          ? $formatter->format($date->getTimestamp(), 'custom', $date->format('Y-m') === $end->format('Y-m') ? 'j' : 'j F', 'UTC') . '–' . $formatter->format($end->getTimestamp(), 'custom', 'j F Y', 'UTC')
          : $formatter->format($date->getTimestamp(), 'custom', 'l, j F Y', 'UTC');
        $last_day = $has_range ? $item->end_date : $item->date;
        $status = $today < $item->date ? 'upcoming' : ($today > $last_day ? 'past' : ($has_range ? 'ongoing' : 'today'));
        $rows[] = [
          'date' => $item->date,
          'date_label' => $date_label,
          'end_date' => $has_range ? $item->end_date : NULL,
          'title' => $item->title, 'status' => $status,
        ];
      }
      usort($rows, static fn(array $a, array $b): int => [$a['date'], $a['title']] <=> [$b['date'], $b['title']]);
      foreach ($schedule->get('field_documents')->referencedEntities() as $media) {
        $cache->addCacheableDependency($media);
        $access = $media->access('view', NULL, TRUE);
        $cache->addCacheableDependency($access);
        if (!$media->isPublished() || !$access->isAllowed()) {
          continue;
        }
        $field = $media->getSource()->getConfiguration()['source_field'] ?? NULL;
        $file = $field ? $media->get($field)->entity : NULL;
        if (!$file || strtolower(pathinfo($file->getFilename(), PATHINFO_EXTENSION)) !== 'pdf') {
          continue;
        }
        $cache->addCacheableDependency($file);
        $documents[$file->id()] = [
          'title' => $media->label(), 'filename' => $file->getFilename(),
          'url' => \Drupal::service('file_url_generator')->generateString($file->getFileUri()),
          'type' => strtoupper(pathinfo($file->getFilename(), PATHINFO_EXTENSION)),
          'size' => ByteSizeMarkup::create($file->getSize() ?? 0),
        ];
      }
    }
    krsort($years);
    $build = [
      '#theme' => 'ob_holiday_archive', '#year' => $year, '#years' => $years,
      '#search' => $search, '#rows' => $rows, '#documents' => $documents,
      '#has_schedule' => (bool) $schedule,
      '#attached' => ['library' => ['ob_site/public_holidays']],
    ];
    $cache->applyTo($build);
    return $build;
  }

}
