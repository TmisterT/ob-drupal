<?php

/**
 * @file
 * Bilingual public listing hooks for the ob_site module.
 */

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * New translations must start as drafts even when their source is published.
 * Leave submitted values and existing translation revisions untouched.
 */
function ob_site_form_node_update_form_alter(array &$form, \Drupal\Core\Form\FormStateInterface $form_state): void {
  $target = $form_state->get('content_translation')['target'] ?? NULL;
  $node = $form_state->getFormObject()->getEntity();
  if (!$target || !$node->hasTranslation($target->getId())
    || !$node->getTranslation($target->getId())->isNewTranslation()
    || $form_state->isRebuilding() || $form_state->getUserInput()) {
    return;
  }
  if (isset($form['moderation_state']['widget'][0]['state']['#options']['draft'])) {
    $form['moderation_state']['widget'][0]['state']['#default_value'] = 'draft';
    $form['moderation_state']['widget'][0]['current']['#access'] = FALSE;
  }
}

/**
 * Implements hook_views_query_alter().
 *
 * Keep one row per release while searching all its published titles. A release
 * remains discoverable when only its non-original translation is published.
 */
function ob_site_views_query_alter(\Drupal\views\ViewExecutable $view, \Drupal\views\Plugin\views\query\QueryPluginBase $query): void {
  if ($view->id() === 'resource_library' && in_array($view->current_display, ['page_gazettes', 'page_library', 'page_forms'], TRUE) && $query instanceof \Drupal\views\Plugin\views\query\Sql) {
    $alias = $query->ensureTable('node_field_data');
    foreach ($query->where as &$group) {
      foreach ($group['conditions'] as &$condition) {
        if ($condition['field'] === $alias . '.title' && strtoupper($condition['operator']) === 'LIKE') {
          // EXISTS also avoids duplicating records when fields have many values.
          $condition = [
            'field' => "($alias.title LIKE :ob_gazette_title OR EXISTS (SELECT 1 FROM {node__field_reference_number} ob_reference WHERE ob_reference.entity_id = $alias.nid AND ob_reference.deleted = 0 AND ob_reference.field_reference_number_value LIKE :ob_gazette_reference))",
            'value' => [':ob_gazette_title' => $condition['value'], ':ob_gazette_reference' => $condition['value']],
            'operator' => 'formula',
          ];
        }
      }
      unset($condition);
    }
    unset($group);
    return;
  }
  if (!in_array($view->id(), ['updates', 'homepage_featured_updates'], TRUE) || !$query instanceof \Drupal\views\Plugin\views\query\Sql) {
    return;
  }
  $alias = $query->ensureTable('node_field_data');
  if ($view->id() === 'homepage_featured_updates') {
    // Select one source row per node before Views applies the three-item limit.
    // Publication is checked across translations below, including nodes whose
    // original translation is still a draft.
    $query->addWhere(0, $alias . '.default_langcode', 1);
  }
  foreach ($query->where as &$group) {
    foreach ($group['conditions'] as &$condition) {
      if ($condition['field'] === $alias . '.status' && (string) $condition['value'] === '1') {
        $condition = [
          'field' => "EXISTS (SELECT 1 FROM {node_field_data} ob_published WHERE ob_published.nid = $alias.nid AND ob_published.status = 1)",
          'value' => [], 'operator' => 'formula',
        ];
      }
      elseif ($condition['field'] === $alias . '.title' && in_array(strtoupper($condition['operator']), ['LIKE', 'NOT LIKE', '=', '<>'], TRUE)) {
        $operator = strtoupper($condition['operator']);
        $condition = [
          'field' => "EXISTS (SELECT 1 FROM {node_field_data} ob_title WHERE ob_title.nid = $alias.nid AND ob_title.status = 1 AND ob_title.title $operator :ob_translation_title)",
          'value' => [':ob_translation_title' => $condition['value']], 'operator' => 'formula',
        ];
      }
    }
    unset($condition);
  }
  unset($group);
}

/**
 * Implements hook_views_pre_render().
 *
 * Render public update cards in an available, published language.
 */
function ob_site_views_pre_render(\Drupal\views\ViewExecutable $view): void {
  if ($view->id() !== 'updates') {
    return;
  }
  $langcode = \Drupal::languageManager()->getCurrentLanguage(\Drupal\Core\Language\LanguageInterface::TYPE_CONTENT)->getId();
  foreach ($view->result as $row) {
    $node = $row->_entity ?? NULL;
    if (!$node) {
      continue;
    }
    $candidates = array_unique(array_merge([$langcode, $node->getUntranslated()->language()->getId()], array_keys($node->getTranslationLanguages())));
    foreach ($candidates as $candidate) {
      if ($node->hasTranslation($candidate)) {
        $translation = $node->getTranslation($candidate);
        if ($translation->isPublished() && $translation->access('view')) {
          $row->_entity = $translation;
          break;
        }
      }
    }
  }
}
