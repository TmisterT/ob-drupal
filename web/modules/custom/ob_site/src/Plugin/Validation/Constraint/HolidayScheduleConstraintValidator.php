<?php

namespace Drupal\ob_site\Plugin\Validation\Constraint;

use Drupal\node\NodeInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class HolidayScheduleConstraintValidator extends ConstraintValidator {

  public function validate($node, Constraint $constraint): void {
    if (!$node instanceof NodeInterface || $node->bundle() !== 'annual_holidays') {
      return;
    }
    $year = (int) $node->get('field_holiday_year')->value;
    $query = \Drupal::entityQuery('node')->accessCheck(FALSE)->condition('type', 'annual_holidays')->condition('field_holiday_year', $year);
    if (!$node->isNew()) {
      $query->condition('nid', $node->id(), '<>');
    }
    if ($query->count()->execute()) {
      $this->context->buildViolation('A schedule already exists for this year. Edit that schedule instead.')->atPath('field_holiday_year')->addViolation();
    }
    foreach ($node->get('field_holiday_entries') as $delta => $item) {
      if ($item->isEmpty()) {
        continue;
      }
      $date = preg_match('/^\d{4}-\d{2}-\d{2}$/D', (string) $item->date) ? \DateTimeImmutable::createFromFormat('!Y-m-d', (string) $item->date) : FALSE;
      if (!$date || $date->format('Y-m-d') !== $item->date || (int) $date->format('Y') !== $year) {
        $this->context->buildViolation('Enter a valid date within the schedule year.')->atPath("field_holiday_entries.$delta.date")->addViolation();
      }
      if (trim((string) $item->end_date) !== '') {
        $end = preg_match('/^\d{4}-\d{2}-\d{2}$/D', (string) $item->end_date) ? \DateTimeImmutable::createFromFormat('!Y-m-d', (string) $item->end_date) : FALSE;
        if (!$end || $end->format('Y-m-d') !== $item->end_date || (int) $end->format('Y') !== $year || ($date && $end < $date)) {
          $this->context->buildViolation('Enter an end date on or after the start date within the schedule year.')->atPath("field_holiday_entries.$delta.end_date")->addViolation();
        }
      }
      if (trim((string) $item->title) === '') {
        $this->context->buildViolation('Enter a title for this holiday.')->atPath("field_holiday_entries.$delta.title")->addViolation();
      }
    }
    if ($node->isPublished()) {
      if ($node->get('field_holiday_entries')->isEmpty()) {
        $this->context->buildViolation('Add holiday entries before publishing this schedule.')->atPath('field_holiday_entries')->addViolation();
      }
      $has_document = FALSE;
      foreach ($node->get('field_documents')->referencedEntities() as $media) {
        $source = $media->getSource()->getConfiguration()['source_field'] ?? NULL;
        $file = $source ? $media->get($source)->entity : NULL;
        $has_document = $has_document || ($media->isPublished() && $file && $file->isPermanent() && strtolower(pathinfo($file->getFilename(), PATHINFO_EXTENSION)) === 'pdf');
      }
      if (!$has_document) {
        $this->context->buildViolation('Attach a published official PDF before publishing this schedule.')->atPath('field_documents')->addViolation();
      }
    }
  }

}
