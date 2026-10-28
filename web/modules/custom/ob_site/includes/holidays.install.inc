<?php

/**
 * @file
 * Provisions editable annual holiday schedules without replacing legacy notices.
 */

/**
 * Creates the annual schedule bundle, fields and editor displays.
 */
function ob_site_ensure_holiday_structure(): void {
  if (!\Drupal\node\Entity\NodeType::load('annual_holidays')) {
    \Drupal\node\Entity\NodeType::create([
      'type' => 'annual_holidays', 'name' => 'Annual Public Holidays',
      'description' => 'One annual national holiday schedule with its official document and dated holiday entries.',
      'new_revision' => TRUE,
    ])->save();
  }
  $fields = [
    'field_featured' => ['boolean', 1, 'Feature on homepage', FALSE, ['on_label' => 'Featured', 'off_label' => 'Not featured'], []],
    'field_holiday_year' => ['integer', 1, 'Year', TRUE, ['min' => 1900, 'max' => 2200], []],
    'field_holiday_entries' => ['ob_holiday_entry', -1, 'Holidays', FALSE, [], []],
    'field_documents' => ['entity_reference', -1, 'Official annual documents', FALSE, ['handler' => 'default:media', 'handler_settings' => ['target_bundles' => ['document' => 'document']]], ['target_type' => 'media']],
  ];
  foreach ($fields as $name => [$type, $cardinality, $label, $required, $settings, $storage_settings]) {
    if (!\Drupal\field\Entity\FieldStorageConfig::loadByName('node', $name)) {
      \Drupal\field\Entity\FieldStorageConfig::create(['entity_type' => 'node', 'field_name' => $name, 'type' => $type, 'cardinality' => $cardinality, 'settings' => $storage_settings])->save();
    }
    if (!\Drupal\field\Entity\FieldConfig::loadByName('node', 'annual_holidays', $name)) {
      \Drupal\field\Entity\FieldConfig::create([
        'entity_type' => 'node', 'bundle' => 'annual_holidays', 'field_name' => $name,
        'label' => $label, 'required' => $required, 'settings' => $settings,
        'description' => match ($name) {
          'field_featured' => 'Show this published annual schedule in Homepage News and Official Updates. Past years are excluded.',
          'field_holiday_entries' => 'Add each holiday using its official date and title. Status is calculated automatically from the dates. Rows appear in date order.',
          'field_documents' => 'Attach the approved annual notice from the Document Media Library. A published document and holiday entries are required before publication.',
          default => 'Use one schedule per year, for example 2026 or 2027.',
        },
      ])->save();
    }
  }
  $form = \Drupal::service('entity_display.repository')->getFormDisplay('node', 'annual_holidays');
  $form->setComponent('title', ['type' => 'string_textfield', 'weight' => -10])
    ->setComponent('field_holiday_year', ['type' => 'number', 'weight' => -9])
    ->setComponent('field_featured', ['type' => 'boolean_checkbox', 'weight' => -6])
    ->setComponent('field_documents', ['type' => 'media_library_widget', 'weight' => -8])
    ->setComponent('field_holiday_entries', ['type' => 'ob_holiday_entry', 'weight' => -7])
    ->setComponent('status', ['type' => 'boolean_checkbox', 'weight' => 10])->save();
  // The archive renders structured rows itself; generic node rendering stays safe.
  $view = \Drupal::service('entity_display.repository')->getViewDisplay('node', 'annual_holidays');
  foreach (array_keys($fields) as $name) {
    $view->removeComponent($name);
  }
  $view->save();
  if ($role = \Drupal\user\Entity\Role::load('media_editor')) {
    $role->grantPermission('create annual_holidays content')->grantPermission('edit any annual_holidays content')->save();
  }
  ob_site_ensure_holiday_menu();
  ob_site_include_holidays_in_notices();
}

/**
 * Places the holiday directory below Public Notices in the main menu.
 */
function ob_site_ensure_holiday_menu(): void {
  // Holidays belong in the Public Notices listing, not in a submenu.
  $storage = \Drupal::entityTypeManager()->getStorage('menu_link_content');
  $links = $storage->loadByProperties(['menu_name' => 'main', 'link.uri' => 'internal:/news-media/public-holidays']);
  $storage->delete($links);
}

/**
 * Includes annual schedules in the searchable Public Notices listing.
 */
function ob_site_include_holidays_in_notices(): void {
  if (!\Drupal\field\Entity\FieldConfig::loadByName('node', 'annual_holidays', 'field_notice_category')) {
    \Drupal\field\Entity\FieldConfig::create([
      'entity_type' => 'node', 'bundle' => 'annual_holidays', 'field_name' => 'field_notice_category',
      'label' => 'Category', 'settings' => ['handler' => 'default:taxonomy_term', 'handler_settings' => ['target_bundles' => ['notice_category' => 'notice_category']]],
    ])->save();
  }
  if ($view = \Drupal\views\Entity\View::load('public_notices')) {
    $displays = $view->get('display');
    $displays['default']['display_options']['filters']['type']['value']['annual_holidays'] = 'annual_holidays';
    $view->set('display', $displays)->save();
  }
  foreach (\Drupal::entityTypeManager()->getStorage('node')->loadByProperties(['type' => 'annual_holidays']) as $node) {
    ob_site_assign_holiday_category($node);
    $node->save();
  }
}
