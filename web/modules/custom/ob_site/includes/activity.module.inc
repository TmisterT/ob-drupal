<?php

/**
 * @file
 * Records editorial activity using Drupal's retained database log.
 */

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\Core\Entity\RevisionableInterface;

/**
 * Records metadata only: never field bodies, passwords or form submissions.
 */
function ob_site_record_activity(EntityInterface $entity, string $operation): void {
  $type = $entity->getEntityTypeId();
  if (!in_array($type, ['node', 'media', 'user', 'user_role'], TRUE)) {
    return;
  }
  $action = ['insert' => 'Created', 'update' => 'Updated', 'delete' => 'Deleted'][$operation];
  $original = $entity->getOriginal();
  if ($type === 'user' && $operation === 'update') {
    $fields = ['name', 'mail', 'roles', 'status', 'pass'];
    $changed = array_filter($fields, static fn($field) => !$original || $entity->get($field)->getValue() !== $original->get($field)->getValue());
    // Last-access and login timestamps are not account edits.
    if (!$changed) {
      return;
    }
    if (in_array('roles', $changed, TRUE)) {
      $action = 'Changed account roles';
    }
    elseif (in_array('status', $changed, TRUE)) {
      $action = $entity->isActive() ? 'Activated account' : 'Blocked account';
    }
    else {
      $action = 'Updated account';
    }
  }
  elseif ($entity instanceof EntityPublishedInterface && $operation !== 'delete') {
    if ($entity instanceof RevisionableInterface && !$entity->isDefaultRevision()) {
      $action = 'Saved revision';
    }
    elseif ($entity->isPublished() && ($operation === 'insert' || ($original && !$original->isPublished()))) {
      $action = 'Published';
    }
    elseif ($operation === 'update' && !$entity->isPublished() && $original?->isPublished()) {
      $action = 'Unpublished';
    }
  }
  $channel = match ($type) {
    'user' => 'ob_account',
    'user_role' => 'ob_role',
    default => 'ob_content',
  };
  $context = [
    '@action' => $action,
    '@title' => mb_substr($entity->label() ?? (string) $entity->id(), 0, 255),
    '@entity_type' => $type,
    '@entity_id' => (string) $entity->id(),
  ];
  // The logger records the actual acting user; content ownership is different.
  \Drupal::logger($channel)->notice('@action: @title (@entity_type @entity_id).', $context);
}

/**
 * Implements hook_entity_insert().
 */
function ob_site_entity_insert(EntityInterface $entity): void {
  ob_site_record_activity($entity, 'insert');
}

/**
 * Implements hook_entity_update().
 */
function ob_site_entity_update(EntityInterface $entity): void {
  ob_site_record_activity($entity, 'update');
}

/**
 * Implements hook_entity_delete().
 */
function ob_site_entity_delete(EntityInterface $entity): void {
  ob_site_record_activity($entity, 'delete');
}
