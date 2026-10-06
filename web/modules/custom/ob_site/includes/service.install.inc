<?php

declare(strict_types=1);

use Drupal\Core\Entity\Entity\EntityFormDisplay;
use Drupal\Core\Entity\Entity\EntityViewDisplay;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\node\Entity\NodeType;
use Drupal\taxonomy\Entity\Vocabulary;

/**
 * Creates the Standard Service and Honours & Awards admin structures.
 */
function ob_site_ensure_service_content_types(): void {
  $standard_type = NodeType::load('service') ?? NodeType::create([
    'type' => 'service',
    'name' => 'Standard Service',
    'new_revision' => TRUE,
    'preview_mode' => 1,
    'display_submitted' => FALSE,
  ]);
  $standard_type
    ->set('name', 'Standard Service')
    ->set('description', 'A reusable public service such as a grant, application, permit, or support programme.')
    ->setThirdPartySetting('menu_ui', 'available_menus', ['main'])
    ->setThirdPartySetting('menu_ui', 'parent', 'main:')
    ->save();

  $awards_type = NodeType::load('honours_awards') ?? NodeType::create([
    'type' => 'honours_awards',
    'name' => 'Honours & Awards',
    'new_revision' => TRUE,
    'preview_mode' => 1,
    'display_submitted' => FALSE,
  ]);
  $awards_type
    ->set('description', 'Public information about official honours, award criteria, and nomination processes.')
    ->setThirdPartySetting('menu_ui', 'available_menus', ['main'])
    ->setThirdPartySetting('menu_ui', 'parent', 'main:')
    ->save();

  if (!Vocabulary::load('award_category')) {
    Vocabulary::create([
      'vid' => 'award_category',
      'name' => 'Award categories',
      'description' => 'Official honour and award groups, categories, codes, and criteria.',
    ])->save();
  }

  $storage_definitions = [
    'field_application_status' => [
      'type' => 'list_string',
      'cardinality' => 1,
      'settings' => [
        'allowed_values' => [
          'open' => 'Open',
          'closed' => 'Closed',
          'coming_soon' => 'Coming soon',
        ],
      ],
    ],
    'field_opening_date' => ['type' => 'datetime', 'cardinality' => 1, 'settings' => ['datetime_type' => 'date']],
    'field_closing_date' => ['type' => 'datetime', 'cardinality' => 1, 'settings' => ['datetime_type' => 'date']],
    'field_eligibility' => ['type' => 'text_long', 'cardinality' => 1],
    'field_requirements' => ['type' => 'text_long', 'cardinality' => 1],
    'field_application_steps' => ['type' => 'text_long', 'cardinality' => -1],
    'field_processing_info' => ['type' => 'text_long', 'cardinality' => 1],
    'field_contact_email' => ['type' => 'string', 'cardinality' => 1, 'settings' => ['max_length' => 254]],
    'field_award_categories' => [
      'type' => 'entity_reference',
      'cardinality' => -1,
      'settings' => ['target_type' => 'taxonomy_term'],
    ],
  ];

  foreach ($storage_definitions as $field_name => $definition) {
    if (FieldStorageConfig::loadByName('node', $field_name)) {
      continue;
    }
    FieldStorageConfig::create([
      'field_name' => $field_name,
      'entity_type' => 'node',
      'type' => $definition['type'],
      'settings' => $definition['settings'] ?? [],
      'cardinality' => $definition['cardinality'],
      'translatable' => TRUE,
    ])->save();
  }

  if (!FieldStorageConfig::loadByName('taxonomy_term', 'field_award_code')) {
    FieldStorageConfig::create([
      'field_name' => 'field_award_code',
      'entity_type' => 'taxonomy_term',
      'type' => 'string',
      'settings' => ['max_length' => 40],
      'cardinality' => 1,
      'translatable' => TRUE,
    ])->save();
  }
  if (!FieldConfig::loadByName('taxonomy_term', 'award_category', 'field_award_code')) {
    FieldConfig::create([
      'field_name' => 'field_award_code',
      'entity_type' => 'taxonomy_term',
      'bundle' => 'award_category',
      'label' => 'Award code',
      'description' => 'Optional official abbreviation displayed beside the award name.',
      'required' => FALSE,
    ])->save();
  }

  $taxonomy_settings = static fn(string $vocabulary): array => [
    'handler' => 'default:taxonomy_term',
    'handler_settings' => [
      'target_bundles' => [$vocabulary => $vocabulary],
      'sort' => ['field' => 'name', 'direction' => 'ASC'],
      'auto_create' => FALSE,
    ],
  ];
  $document_settings = [
    'handler' => 'default:media',
    'handler_settings' => [
      'target_bundles' => ['document' => 'document'],
      'sort' => ['field' => '_none', 'direction' => 'ASC'],
      'auto_create' => FALSE,
      'auto_create_bundle' => NULL,
    ],
  ];

  $fields = [
    'field_summary' => ['label' => 'Public summary', 'description' => 'A concise explanation displayed at the top of the page and in service listings.', 'required' => TRUE, 'settings' => [], 'widget' => 'string_textarea', 'widget_settings' => ['rows' => 3, 'placeholder' => 'Explain this service in one or two sentences.'], 'formatter' => 'basic_string'],
    'field_application_status' => ['label' => 'Availability', 'description' => 'Current public availability of applications or nominations.', 'required' => TRUE, 'settings' => [], 'widget' => 'options_select', 'formatter' => 'list_default'],
    'field_opening_date' => ['label' => 'Opening date', 'description' => 'Optional opening date.', 'required' => FALSE, 'settings' => [], 'widget' => 'datetime_default', 'formatter' => 'datetime_custom', 'formatter_settings' => ['timezone_override' => '', 'date_format' => 'j F Y']],
    'field_closing_date' => ['label' => 'Closing date', 'description' => 'Optional closing date or deadline.', 'required' => FALSE, 'settings' => [], 'widget' => 'datetime_default', 'formatter' => 'datetime_custom', 'formatter_settings' => ['timezone_override' => '', 'date_format' => 'j F Y']],
    'body' => ['label' => 'About', 'description' => 'Explain the purpose and public benefit.', 'required' => TRUE, 'settings' => ['display_summary' => FALSE, 'required_summary' => FALSE], 'widget' => 'text_textarea_with_summary', 'widget_settings' => ['rows' => 12, 'summary_rows' => 3, 'placeholder' => ''], 'formatter' => 'text_default'],
    'field_eligibility' => ['label' => 'Eligibility', 'description' => 'Explain who is eligible and any conditions they must meet.', 'required' => TRUE, 'settings' => [], 'widget' => 'text_textarea', 'widget_settings' => ['rows' => 8, 'placeholder' => ''], 'formatter' => 'text_default'],
    'field_requirements' => ['label' => 'Requirements', 'description' => 'List the information, evidence, or documents that must be provided.', 'required' => TRUE, 'settings' => [], 'widget' => 'text_textarea', 'widget_settings' => ['rows' => 8, 'placeholder' => ''], 'formatter' => 'text_default'],
    'field_application_steps' => ['label' => 'Process steps', 'description' => 'Add each application or nomination step in the correct order.', 'required' => TRUE, 'settings' => [], 'widget' => 'text_textarea', 'widget_settings' => ['rows' => 4, 'placeholder' => ''], 'formatter' => 'text_default'],
    'field_processing_info' => ['label' => 'Review and processing', 'description' => 'Explain what happens after submission, including assessment and notification.', 'required' => FALSE, 'settings' => [], 'widget' => 'text_textarea', 'widget_settings' => ['rows' => 8, 'placeholder' => ''], 'formatter' => 'text_default'],
    'field_documents' => ['label' => 'Forms and official documents', 'description' => 'Attach forms or guidance from the Media Library.', 'required' => FALSE, 'settings' => $document_settings, 'widget' => 'media_library_widget', 'formatter' => 'entity_reference_entity_view', 'formatter_settings' => ['view_mode' => 'default', 'link' => FALSE]],
    'field_service_link' => ['label' => 'Primary action', 'description' => 'Optional link to an online form or service system.', 'required' => FALSE, 'settings' => ['title' => 2, 'link_type' => 17], 'widget' => 'link_default', 'formatter' => 'link', 'formatter_settings' => ['trim_length' => 100, 'url_only' => FALSE, 'url_plain' => FALSE, 'rel' => '', 'target' => '']],
    'field_contact_email' => ['label' => 'Contact email', 'description' => 'Public email address for questions.', 'required' => FALSE, 'settings' => [], 'widget' => 'string_textfield', 'widget_settings' => ['size' => 60, 'placeholder' => 'name@example.gov.ki'], 'formatter' => 'string'],
    'field_service_category' => ['label' => 'Service category', 'description' => 'Category used to group this page in service listings.', 'required' => TRUE, 'settings' => $taxonomy_settings('service_category'), 'widget' => 'options_select', 'formatter' => 'entity_reference_label', 'formatter_settings' => ['link' => FALSE]],
    'field_audience' => ['label' => 'Audience', 'description' => 'Select the public audiences for this service.', 'required' => FALSE, 'settings' => $taxonomy_settings('audience'), 'widget' => 'entity_reference_autocomplete_tags', 'formatter' => 'entity_reference_label', 'formatter_settings' => ['link' => TRUE]],
    'field_content_owner' => ['label' => 'Content owner', 'description' => 'Division or team responsible for this information.', 'required' => TRUE, 'settings' => [], 'widget' => 'string_textfield', 'widget_settings' => ['size' => 60, 'placeholder' => ''], 'formatter' => 'string'],
    'field_last_reviewed' => ['label' => 'Last reviewed', 'description' => 'Date this information was last verified.', 'required' => TRUE, 'settings' => [], 'widget' => 'datetime_default', 'formatter' => 'datetime_custom', 'formatter_settings' => ['timezone_override' => '', 'date_format' => 'j F Y']],
  ];
  $award_field = [
    'field_award_categories' => [
      'label' => 'Award categories and criteria',
      'description' => 'Select award terms in display order. Manage names, codes, criteria, and parent groups in the Award categories vocabulary.',
      'required' => TRUE,
      'settings' => $taxonomy_settings('award_category'),
      'widget' => 'entity_reference_autocomplete_tags',
      'formatter' => 'entity_reference_label',
      'formatter_settings' => ['link' => FALSE],
    ],
  ];

  foreach (['service' => $fields, 'honours_awards' => array_merge(array_slice($fields, 0, 5, TRUE), $award_field, array_slice($fields, 5, NULL, TRUE))] as $bundle => $bundle_fields) {
    $form_display = EntityFormDisplay::load("node.$bundle.default") ?? EntityFormDisplay::create([
      'targetEntityType' => 'node',
      'bundle' => $bundle,
      'mode' => 'default',
      'status' => TRUE,
    ]);
    $view_display = EntityViewDisplay::load("node.$bundle.default") ?? EntityViewDisplay::create([
      'targetEntityType' => 'node',
      'bundle' => $bundle,
      'mode' => 'default',
      'status' => TRUE,
    ]);

    $form_display
      ->setComponent('title', ['type' => 'string_textfield', 'weight' => -10, 'region' => 'content', 'settings' => ['size' => 60, 'placeholder' => '']])
      ->setComponent('status', ['type' => 'boolean_checkbox', 'weight' => 100, 'region' => 'content', 'settings' => ['display_label' => TRUE]]);

    $weight = 0;
    foreach ($bundle_fields as $field_name => $definition) {
      $field_config = FieldConfig::loadByName('node', $bundle, $field_name);
      if (!$field_config) {
        $field_config = FieldConfig::create([
          'field_name' => $field_name,
          'entity_type' => 'node',
          'bundle' => $bundle,
        ]);
      }

      $field_config
        ->setLabel($definition['label'])
        ->setDescription($definition['description'])
        ->setRequired($definition['required'])
        ->set('settings', $definition['settings'])
        ->save();

      $form_display->setComponent($field_name, [
        'type' => $definition['widget'],
        'weight' => $weight,
        'region' => 'content',
        'settings' => $definition['widget_settings'] ?? [],
      ]);
      $view_display->setComponent($field_name, [
        'type' => $definition['formatter'],
        'weight' => $weight,
        'region' => 'content',
        'label' => 'hidden',
        'settings' => $definition['formatter_settings'] ?? [],
      ]);
      $weight++;
    }

    $form_display->save();
    $view_display->save();
  }
}

/**
 * Migrates legacy published award pages and cleans the Standard Service form.
 */
function ob_site_migrate_honours_awards_content(): void {
  ob_site_ensure_service_content_types();

  $node_storage = \Drupal::entityTypeManager()->getStorage('node');
  $legacy_ids = $node_storage->getQuery()
    ->accessCheck(FALSE)
    ->condition('type', 'service')
    ->condition('title', 'Honours & Awards')
    ->execute();

  $field_names = [
    'field_summary',
    'field_application_status',
    'field_opening_date',
    'field_closing_date',
    'body',
    'field_award_categories',
    'field_eligibility',
    'field_requirements',
    'field_application_steps',
    'field_processing_info',
    'field_documents',
    'field_service_link',
    'field_contact_email',
    'field_service_category',
    'field_audience',
    'field_content_owner',
    'field_last_reviewed',
  ];

  foreach ($node_storage->loadMultiple($legacy_ids) as $legacy) {
    $existing_ids = $node_storage->getQuery()
      ->accessCheck(FALSE)
      ->condition('type', 'honours_awards')
      ->condition('title', $legacy->label())
      ->execute();
    $award_page = $existing_ids ? $node_storage->load(reset($existing_ids)) : NULL;

    if (!$award_page) {
      $award_page = \Drupal\node\Entity\Node::create([
        'type' => 'honours_awards',
        'title' => $legacy->label(),
        'langcode' => $legacy->language()->getId(),
        'uid' => $legacy->getOwnerId(),
        'status' => $legacy->isPublished(),
        'created' => $legacy->getCreatedTime(),
      ]);

      foreach ($field_names as $field_name) {
        if ($legacy->hasField($field_name) && $award_page->hasField($field_name) && !$legacy->get($field_name)->isEmpty()) {
          $award_page->set($field_name, $legacy->get($field_name)->getValue());
        }
      }

      $award_page->setNewRevision(TRUE);
      $award_page->setRevisionLogMessage('Move Honours & Awards to its dedicated content type.');
      $award_page->save();
    }

    $aliases = \Drupal::entityTypeManager()->getStorage('path_alias')->loadByProperties([
      'path' => '/node/' . $legacy->id(),
    ]);
    foreach ($aliases as $alias) {
      $alias->setPath('/node/' . $award_page->id())->save();
    }

    if ($legacy->isPublished()) {
      if ($legacy->hasField('moderation_state')) {
        $legacy->set('moderation_state', 'archived');
      }
      else {
        $legacy->setUnpublished();
      }
      $legacy->setNewRevision(TRUE);
      $legacy->setRevisionLogMessage('Replaced by the dedicated Honours & Awards content item.');
      $legacy->save();
    }
  }

  EntityFormDisplay::load('node.service.default')
    ?->removeComponent('field_award_categories')
    ->save();
  EntityViewDisplay::load('node.service.default')
    ?->removeComponent('field_award_categories')
    ->save();
  FieldConfig::loadByName('node', 'service', 'field_award_categories')?->delete();
}
