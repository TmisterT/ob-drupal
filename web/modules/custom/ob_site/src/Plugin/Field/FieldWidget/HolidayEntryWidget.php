<?php

namespace Drupal\ob_site\Plugin\Field\FieldWidget;

use Drupal\Core\Field\Attribute\FieldWidget;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Edits each holiday as a date, title and optional description.
 */
#[FieldWidget(
  id: 'ob_holiday_entry',
  label: new TranslatableMarkup('Holiday rows'),
  field_types: ['ob_holiday_entry'],
)]
final class HolidayEntryWidget extends WidgetBase {

  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['#type'] = 'fieldset';
    $element['#title'] = $this->t('Holiday @number', ['@number' => $delta + 1]);
    $element['date'] = ['#type' => 'date', '#title' => $this->t('Start date'), '#default_value' => $items[$delta]->date ?? ''];
    $element['end_date'] = ['#type' => 'date', '#title' => $this->t('End date (optional)'), '#description' => $this->t('Leave blank for a single-day holiday.'), '#default_value' => $items[$delta]->end_date ?? ''];
    $element['title'] = ['#type' => 'textfield', '#title' => $this->t('Title'), '#maxlength' => 255, '#default_value' => $items[$delta]->title ?? ''];
    $element['description'] = ['#type' => 'textarea', '#title' => $this->t('Description (optional)'), '#rows' => 2, '#maxlength' => 2000, '#default_value' => $items[$delta]->description ?? ''];
    return $element;
  }

}
