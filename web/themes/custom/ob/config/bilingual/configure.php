<?php

/**
 * Run with Drush php:script after enabling language and content_translation.
 * Configures bilingual News and Update content without changing article copy.
 */

use Drupal\language\Entity\ConfigurableLanguage;
use Drupal\language\Entity\ContentLanguageSettings;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\Core\Entity\Entity\EntityFormDisplay;
use Drupal\Core\Entity\Entity\EntityViewDisplay;
use Drupal\Core\Field\Entity\BaseFieldOverride;
use Drupal\user\Entity\Role;
use Drupal\workflows\Entity\Workflow;
use Drupal\views\Entity\View;
use Symfony\Component\Yaml\Yaml;

if (!ConfigurableLanguage::load('gil')) {
  ConfigurableLanguage::create(['id' => 'gil', 'label' => 'Kiribati', 'direction' => 'ltr', 'weight' => 1])->save();
}
\Drupal::configFactory()->getEditable('language.negotiation')
  ->set('url.source', 'path_prefix')
  ->set('url.prefixes.en', '')
  ->set('url.prefixes.gil', 'gil')
  ->set('url.domains.gil', '')
  ->save();
\Drupal::configFactory()->getEditable('language.types')
  ->set('negotiation.language_interface.enabled', ['language-url' => 0, 'language-selected' => 1])
  ->set('negotiation.language_content.enabled', ['language-interface' => 0])
  ->save();

$settings = ContentLanguageSettings::loadByEntityTypeBundle('node', 'update');
$settings->setDefaultLangcode('en')->setLanguageAlterable(TRUE)
  ->setThirdPartySetting('content_translation', 'enabled', TRUE)
  ->setThirdPartySetting('content_translation', 'bundle_settings', ['untranslatable_fields_hide' => TRUE])
  ->save();
foreach (\Drupal::entityTypeManager()->getStorage('field_config')->loadByProperties(['entity_type' => 'node', 'bundle' => 'update']) as $field) {
  $field->setTranslatable(in_array($field->getName(), ['body', 'field_summary', 'field_release_documents'], TRUE))->save();
}
\Drupal::service('entity_field.manager')->clearCachedFieldDefinitions();
$definitions = \Drupal::service('entity_field.manager')->getFieldDefinitions('node', 'update');
foreach (['title', 'status', 'path'] as $name) {
  $override = BaseFieldOverride::load('node.update.' . $name)
    ?: BaseFieldOverride::createFromBaseFieldDefinition($definitions[$name], 'update');
  $override->setTranslatable(TRUE)->save();
}

if (!FieldStorageConfig::loadByName('node', 'field_release_documents')) {
  FieldStorageConfig::create([
    'field_name' => 'field_release_documents', 'entity_type' => 'node',
    'type' => 'entity_reference', 'cardinality' => -1,
    'settings' => ['target_type' => 'media'],
  ])->save();
}
if (!FieldConfig::loadByName('node', 'update', 'field_release_documents')) {
  FieldConfig::create([
    'field_name' => 'field_release_documents', 'entity_type' => 'node', 'bundle' => 'update',
    'label' => 'Release documents',
    'description' => 'Attach the approved release PDF for this language. Each translation can have different documents.',
    'translatable' => TRUE,
    'settings' => ['handler' => 'default:media', 'handler_settings' => ['target_bundles' => ['document' => 'document']]],
  ])->save();
}
$form = EntityFormDisplay::load('node.update.default');
$form->setComponent('langcode', ['type' => 'language_select', 'weight' => -9, 'settings' => ['include_locked' => FALSE]])
  ->setComponent('field_release_documents', ['type' => 'media_library_widget', 'weight' => 3])
  ->setComponent('moderation_state', ['type' => 'moderation_state_default', 'weight' => 100])
  ->removeComponent('status')->save();
foreach (['default', 'full'] as $mode) {
  $display = EntityViewDisplay::load('node.update.' . $mode);
  $display->setComponent('field_release_documents', [
    'type' => 'entity_reference_entity_view', 'label' => 'hidden',
    'settings' => ['view_mode' => 'default', 'link' => FALSE], 'weight' => 15,
  ])->save();
}
EntityViewDisplay::load('node.update.teaser')->removeComponent('field_release_documents')->save();

if (!Workflow::load('updates_editorial')) {
  Workflow::create([
    'id' => 'updates_editorial', 'label' => 'News and Update editorial', 'type' => 'content_moderation',
    'type_settings' => [
      'states' => [
        'draft' => ['label' => 'Draft', 'weight' => 0, 'published' => FALSE, 'default_revision' => FALSE],
        'needs_review' => ['label' => 'Needs review', 'weight' => 1, 'published' => FALSE, 'default_revision' => FALSE],
        'published' => ['label' => 'Published', 'weight' => 2, 'published' => TRUE, 'default_revision' => TRUE],
        'archived' => ['label' => 'Archived', 'weight' => 3, 'published' => FALSE, 'default_revision' => TRUE],
      ],
      'transitions' => [
        'create_new_draft' => ['label' => 'Save as draft', 'from' => ['draft', 'needs_review', 'published', 'archived'], 'to' => 'draft', 'weight' => 0],
        'submit_for_review' => ['label' => 'Submit for review', 'from' => ['draft', 'needs_review'], 'to' => 'needs_review', 'weight' => 1],
        'publish' => ['label' => 'Publish', 'from' => ['draft', 'needs_review', 'published', 'archived'], 'to' => 'published', 'weight' => 2],
        'archive' => ['label' => 'Archive', 'from' => ['published'], 'to' => 'archived', 'weight' => 3],
      ],
      'entity_types' => ['node' => ['update']], 'default_moderation_state' => 'draft',
    ],
  ])->save();
}
$role = Role::load('content_editor');
if ($role) {
  foreach ([
    'create update content', 'edit any update content', 'translate update node',
    'create content translations', 'update content translations',
    'view latest version', 'view any unpublished content',
    'use updates_editorial transition create_new_draft',
    'use updates_editorial transition submit_for_review',
    'use updates_editorial transition publish',
    'use updates_editorial transition archive',
    'access media overview', 'view media', 'create document media', 'update own document media',
  ] as $permission) {
    $role->grantPermission($permission);
  }
  $role->save();
}

// Query each release once, then display its published translation in the theme.
// Apply to all update listings, including listings that override their filters.
$view = View::load('updates');
$displays = $view->get('display');
foreach ($displays as $id => &$display) {
  if ($id !== 'default' && !isset($display['display_options']['filters'])) {
    continue;
  }
  $display['display_options']['filters']['default_langcode'] = [
    'id' => 'default_langcode', 'table' => 'node_field_data', 'field' => 'default_langcode',
    'entity_type' => 'node', 'entity_field' => 'default_langcode',
    'plugin_id' => 'boolean', 'value' => '1', 'group' => 1, 'exposed' => FALSE,
  ];
}
unset($display);
$view->set('display', $displays)->save();
\Drupal::service('entity_field.manager')->clearCachedFieldDefinitions();
\Drupal::service('router.builder')->rebuild();

// Save a reviewable configuration snapshot inside the theme workspace.
$export = __DIR__ . '/export';
if (!is_dir($export)) {
  mkdir($export, 0775, TRUE);
}
$names = ['core.extension', 'language.negotiation', 'language.types', 'user.role.content_editor',
  'workflows.workflow.updates_editorial', 'views.view.updates'];
foreach (\Drupal::service('config.storage')->listAll() as $name) {
  if (str_starts_with($name, 'language.entity.') || $name === 'language.content_settings.node.update'
    || str_starts_with($name, 'field.field.node.update.')
    || $name === 'field.storage.node.field_release_documents'
    || str_starts_with($name, 'core.base_field_override.node.update.')
    || str_starts_with($name, 'core.entity_form_display.node.update.')
    || str_starts_with($name, 'core.entity_view_display.node.update.')) {
    $names[] = $name;
  }
}
foreach (array_unique($names) as $name) {
  file_put_contents($export . '/' . $name . '.yml', Yaml::dump(\Drupal::service('config.storage')->read($name), 10, 2));
}
echo "Bilingual News and Update configuration saved.\n";
