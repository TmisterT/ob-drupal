<?php

namespace Drupal\ob_site\Plugin\Validation\Constraint;

use Drupal\Core\Validation\Attribute\Constraint;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Symfony\Component\Validator\Constraint as SymfonyConstraint;

#[Constraint(id: 'ObHolidaySchedule', label: new TranslatableMarkup('Valid annual holiday schedule', [], ['context' => 'Validation']), type: 'entity:node')]
final class HolidayScheduleConstraint extends SymfonyConstraint {}
