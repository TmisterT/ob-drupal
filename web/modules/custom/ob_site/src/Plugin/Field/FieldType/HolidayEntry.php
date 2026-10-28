<?php

namespace Drupal\ob_site\Plugin\Field\FieldType;

use Drupal\Core\Field\Attribute\FieldType;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\DataDefinition;

/**
 * One repeatable holiday row within an annual schedule.
 */
#[FieldType(
  id: 'ob_holiday_entry',
  label: new TranslatableMarkup('Holiday entry'),
  description: new TranslatableMarkup('Date, title and optional description of a public holiday.'),
  default_widget: 'ob_holiday_entry',
)]
final class HolidayEntry extends FieldItemBase {

  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    return [
      'date' => DataDefinition::create('string')->setLabel(new TranslatableMarkup('Date')),
      'end_date' => DataDefinition::create('string')->setLabel(new TranslatableMarkup('End date')),
      'title' => DataDefinition::create('string')->setLabel(new TranslatableMarkup('Title'))->addConstraint('Length', ['max' => 255]),
      'description' => DataDefinition::create('string')->setLabel(new TranslatableMarkup('Description'))->addConstraint('Length', ['max' => 2000]),
    ];
  }

  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return ['columns' => [
      'date' => ['type' => 'varchar', 'length' => 10],
      'end_date' => ['type' => 'varchar', 'length' => 10],
      'title' => ['type' => 'varchar', 'length' => 255],
      'description' => ['type' => 'text', 'size' => 'normal'],
    ]];
  }

  public static function mainPropertyName() {
    return 'title';
  }

  public function isEmpty() {
    return trim((string) $this->end_date) === '' && trim((string) $this->date) === '' && trim((string) $this->title) === '' && trim((string) $this->description) === '';
  }

}
