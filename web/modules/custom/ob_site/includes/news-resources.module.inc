<?php

/**
 * @file
 * Access boundaries for the Media Editor.
 */

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;
use Drupal\node\NodeInterface;

/**
 * Whether the account is subject to the scoped editorial policy.
 */
function ob_site_is_resources_editor(AccountInterface $account): bool {
  return $account->hasPermission('manage news and selected resources') && !$account->hasPermission('bypass node access');
}

/**
 * Resolves the site's existing resource sections, failing closed if absent.
 */
function ob_site_editor_resource_sections(): array {
  $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadByProperties([
    'vid' => 'resource_section',
    'name' => ['Gazettes & Instruments', 'Information Library'],
  ]);
  return array_map('intval', array_keys($terms));
}

/**
 * Checks every translation so editing cannot change an out-of-scope record.
 */
function ob_site_editor_node_in_scope(NodeInterface $node): bool {
  if (in_array($node->bundle(), ['update', 'public_notice', 'annual_holidays'], TRUE)) {
    return TRUE;
  }
  if ($node->bundle() !== 'publication' || !$node->hasField('field_resource_section')) {
    return FALSE;
  }
  $allowed = ob_site_editor_resource_sections();
  foreach ($node->getTranslationLanguages() as $language) {
    $sections = $node->getTranslation($language->getId())->get('field_resource_section');
    if ($sections->isEmpty()) {
      return FALSE;
    }
    foreach ($sections as $section) {
      if (!in_array((int) $section->target_id, $allowed, TRUE)) {
        return FALSE;
      }
    }
  }
  return TRUE;
}

/**
 * Implements hook_node_access().
 */
function ob_site_node_access(NodeInterface $node, $operation, AccountInterface $account) {
  $result = AccessResult::neutral()->cachePerPermissions()->addCacheableDependency($node)->addCacheTags(['taxonomy_term_list:resource_section']);
  if (!ob_site_is_resources_editor($account)) {
    return $result;
  }
  $in_scope = ob_site_editor_node_in_scope($node);
  if (in_array($operation, ['update', 'delete'], TRUE) || ($operation === 'view' && !$node->isPublished())) {
    if (!$in_scope) {
      return AccessResult::forbidden()->inheritCacheability($result);
    }
    // Colleagues can continue drafts in the permitted editorial sections.
    if ($operation === 'view' && $account->hasPermission('access content')) {
      return AccessResult::allowed()->inheritCacheability($result);
    }
  }
  return $result;
}

/**
 * Implements hook_entity_type_alter().
 */
function ob_site_entity_type_alter(array &$entity_types): void {
  if (isset($entity_types['node'])) {
    $entity_types['node']->addConstraint('ObEditorialScope');
    $entity_types['node']->addConstraint('ObHolidaySchedule');
  }
}

/**
 * Implements hook_node_presave().
 */
function ob_site_node_presave(NodeInterface $node): void {
  if (ob_site_is_resources_editor(\Drupal::currentUser()) && !ob_site_editor_node_in_scope($node)) {
    throw new \Drupal\Core\Entity\EntityStorageException('This account can save only news, public notices, annual public holidays, Gazettes and Information Library publications.');
  }
}

/**
 * Implements hook_form_node_form_alter().
 */
function ob_site_form_node_form_alter(array &$form, \Drupal\Core\Form\FormStateInterface $form_state): void {
  $node = $form_state->getFormObject()->getEntity();
  if (in_array($node->bundle(), ['publication', 'update', 'annual_holidays'], TRUE) && isset($form['path']['widget'][0]['alias'])) {
    $form['path']['widget'][0]['alias']['#description'] = $node->bundle() === 'annual_holidays'
      ? t('Leave blank to generate the URL from the schedule year. Existing URLs stay unchanged.')
      : t('Leave blank to generate a readable URL from the title when you save. Existing URLs stay unchanged when you edit the title.');
  }
  if (!ob_site_is_resources_editor(\Drupal::currentUser())) {
    return;
  }
  if (isset($form['field_resource_section']['widget']['#options'])) {
    $allowed = ob_site_editor_resource_sections();
    foreach ($form['field_resource_section']['widget']['#options'] as $id => $label) {
      if ($id !== '_none' && !in_array((int) $id, $allowed, TRUE)) {
        unset($form['field_resource_section']['widget']['#options'][$id]);
      }
    }
  }
}
