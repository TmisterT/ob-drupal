<?php

/**
 * @file
 * Shared editorial controls for homepage notice board content.
 */

use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;

/**
 * Adds controls to existing content without duplicating articles or media.
 */
function ob_site_ensure_notice_board_controls(): void {
  $fields = [
    'field_featured' => ['boolean', 'Feature on homepage', [], ['on_label' => 'Featured', 'off_label' => 'Not featured'], 0, 'boolean_checkbox'],
    'field_homepage_order' => ['integer', 'Homepage order', [], ['min' => -1000, 'max' => 1000], 0, 'number'],
    'field_homepage_image_fit' => ['list_string', 'Homepage image display', ['allowed_values' => ['contain' => 'Show whole image', 'cover' => 'Fill frame']], [], 'contain', 'options_select'],
  ];
  foreach (['public_notice', 'update'] as $bundle) {
    if (!\Drupal\node\Entity\NodeType::load($bundle)) {
      continue;
    }
    foreach ($fields as $name => [$type, $label, $storage_settings, $settings, $default, $widget]) {
      if (!FieldStorageConfig::loadByName('node', $name)) {
        FieldStorageConfig::create(['entity_type' => 'node', 'field_name' => $name, 'type' => $type, 'settings' => $storage_settings])->save();
      }
      $field = FieldConfig::loadByName('node', $bundle, $name) ?: FieldConfig::create([
        'entity_type' => 'node', 'bundle' => $bundle, 'field_name' => $name,
        'label' => $label, 'settings' => $settings, 'default_value' => [['value' => $default]],
      ]);
      $field->setTranslatable(FALSE)->setDescription(match ($name) {
        'field_featured' => 'Include this published item in the homepage notice board. Expired public notices are excluded. Up to three selected items of each type appear.',
        'field_homepage_order' => 'Lower numbers appear first, including across News and Public Notices. Use 0 for normal priority. Equal numbers use urgency, then newest date.',
        'field_homepage_image_fit' => 'Show whole image preserves scanned notices and text. Fill frame crops photographs to fill the homepage image area. This does not change the article image.',
      })->save();
      $form = \Drupal::service('entity_display.repository')->getFormDisplay('node', $bundle);
      $form->setComponent($name, ['type' => $widget, 'weight' => 20 + array_search($name, array_keys($fields)), 'settings' => $type === 'boolean' ? ['display_label' => TRUE] : []])->save();
    }
    // Editorial controls must never leak into public article renderings.
    foreach (\Drupal::entityTypeManager()->getStorage('entity_view_display')->loadByProperties(['targetEntityType' => 'node', 'bundle' => $bundle]) as $display) {
      foreach (array_keys($fields) as $name) {
        $display->removeComponent($name);
      }
      $display->save();
    }
  }
  $view = \Drupal\views\Entity\View::load('homepage_featured_updates');
  if ($view) {
    $displays = $view->get('display');
    $sorts = $displays['default']['display_options']['sorts'] ?? [];
    $displays['default']['display_options']['sorts'] = ['field_homepage_order_value' => [
      'id' => 'field_homepage_order_value', 'table' => 'node__field_homepage_order',
      'field' => 'field_homepage_order_value', 'plugin_id' => 'standard', 'order' => 'ASC', 'exposed' => FALSE,
    ]] + $sorts;
    $view->set('display', $displays)->save();
  }
  $view = \Drupal\views\Entity\View::load('content');
  if ($view) {
    $displays = $view->get('display');
    if (isset($displays['default']['display_options']['filters']['field_featured_value'])) {
      $displays['default']['display_options']['filters']['field_featured_value']['expose']['description'] = 'Find items selected for the homepage. Only published content appears; expired notices and past holiday schedules are excluded.';
      $view->set('display', $displays)->save();
    }
  }
}
