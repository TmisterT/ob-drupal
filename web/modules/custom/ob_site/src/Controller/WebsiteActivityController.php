<?php

namespace Drupal\ob_site\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Query\PagerSelectExtender;
use Drupal\Core\Logger\RfcLogLevel;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;

/**
 * Administrator-only reporting; it never changes the login destination.
 */
final class WebsiteActivityController extends ControllerBase {

  private const PERIODS = ['24h' => 86400, '7d' => 604800, '30d' => 2592000, 'all' => 0];

  public function build(Request $request): array {
    $period = $request->query->get('period', '24h');
    $period = isset(self::PERIODS[$period]) ? $period : '24h';
    $kind = $request->query->get('kind', 'all');
    $types = [
      'all' => $this->t('All activity'), 'signin' => $this->t('Sign-ins'),
      'signout' => $this->t('Sign-outs'), 'failed' => $this->t('Failed sign-ins'),
      'blocked' => $this->t('Login blocks'), 'content' => $this->t('Content changes'),
      'accounts' => $this->t('Account changes'), 'roles' => $this->t('Role changes'),
      'errors' => $this->t('Errors'),
    ];
    $kind = isset($types[$kind]) ? $kind : 'all';
    $uid = $request->query->get('uid', '');
    $uid = ctype_digit((string) $uid) ? (string) $uid : '';
    $filters = ['period' => $period, 'kind' => $kind, 'uid' => $uid];
    $database = \Drupal::database();
    $available = $this->moduleHandler()->moduleExists('dblog') && $database->schema()->tableExists('watchdog');
    $users = [];
    $storage = $this->entityTypeManager()->getStorage('user');
    $ids = $storage->getQuery()->accessCheck(FALSE)->condition('uid', 0, '>')->sort('name')->execute();
    foreach ($storage->loadMultiple($ids) as $user) {
      $users[$user->id()] = $user->getAccountName();
    }
    $active_ids = $storage->getQuery()->accessCheck(FALSE)->condition('uid', 0, '>')->condition('status', 1)->condition('access', \Drupal::time()->getRequestTime() - 900, '>=')->sort('access', 'DESC')->range(0, 20)->execute();
    $active = [];
    foreach ($storage->loadMultiple($active_ids) as $user) {
      $roles = $this->entityTypeManager()->getStorage('user_role')->loadMultiple($user->getRoles(TRUE));
      $active[] = [
        'name' => $user->getAccountName(),
        'roles' => implode(', ', array_map(static fn($role) => $role->label(), $roles)) ?: $this->t('Registered user'),
        'access' => $this->date($user->getLastAccessedTime()),
      ];
    }
    $summary = [];
    $events = [];
    if ($available) {
      foreach (['signin' => $this->t('Sign-ins'), 'failed' => $this->t('Failed sign-ins'), 'blocked' => $this->t('Login blocks'), 'content' => $this->t('Content changes'), 'errors' => $this->t('Errors')] as $type => $label) {
        $query = $this->query($filters, $type);
        $summary[] = [
          'label' => $label, 'count' => (int) $query->countQuery()->execute()->fetchField(),
          'url' => Url::fromRoute('ob_site.website_activity', [], ['query' => array_merge($filters, ['kind' => $type])]),
        ];
      }
      $query = $this->query($filters, $kind)->fields('w')->orderBy('w.timestamp', 'DESC')->orderBy('w.wid', 'DESC')->extend(PagerSelectExtender::class)->limit(25);
      foreach ($query->execute() as $row) {
        $variables = unserialize($row->variables, ['allowed_classes' => FALSE]);
        $variables = is_array($variables) ? array_filter($variables, 'is_scalar') : [];
        $message = strip_tags(strtr($row->message, array_map('strval', $variables)));
        $target = NULL;
        if (in_array($row->type, ['ob_content', 'ob_account', 'ob_role'], TRUE)) {
          $entity_type = $variables['@entity_type'] ?? '';
          $entity_id = $variables['@entity_id'] ?? '';
          if (in_array($entity_type, ['node', 'media', 'user', 'user_role'], TRUE) && $entity_id !== '') {
            $entity = $this->entityTypeManager()->getStorage($entity_type)->load($entity_id);
            if ($entity && $entity->hasLinkTemplate('edit-form') && $entity->access('update', $this->currentUser())) {
              $target = $entity->toUrl('edit-form');
            }
          }
        }
        $events[] = [
          'time' => $this->date((int) $row->timestamp),
          'actor' => $row->uid ? ($users[$row->uid] ?? $this->t('Deleted account #@id', ['@id' => $row->uid])) : $this->t('Anonymous / system'),
          'type' => $this->eventLabel($row->type, $row->message, (int) $row->severity),
          'message' => $message, 'target' => $target,
          'details' => $this->currentUser()->hasPermission('access site reports') ? Url::fromRoute('dblog.event', ['event_id' => $row->wid]) : NULL,
        ];
      }
    }
    return [
      '#theme' => 'ob_site_website_activity',
      '#filters' => $filters, '#users' => $users, '#types' => $types,
      '#summary' => $summary, '#events' => $events, '#active_users' => $active,
      '#health' => $this->health(), '#pager' => $available ? ['#type' => 'pager'] : [],
      '#started' => ($started = \Drupal::state()->get('ob_site.activity_started')) ? $this->date($started) : NULL,
      '#retention' => (int) $this->config('dblog.settings')->get('row_limit'),
      '#logging_available' => $available,
      '#attached' => ['library' => ['ob_site/website_activity']],
      '#cache' => ['max-age' => 0],
    ];
  }

  /**
   * Applies actor/time filters and an allowlisted event category.
   */
  private function query(array $filters, string $kind) {
    $query = \Drupal::database()->select('watchdog', 'w');
    if (self::PERIODS[$filters['period']]) {
      $query->condition('w.timestamp', \Drupal::time()->getRequestTime() - self::PERIODS[$filters['period']], '>=');
    }
    if ($filters['uid'] !== '') {
      $query->condition('w.uid', (int) $filters['uid']);
    }
    $condition = $query->orConditionGroup();
    $kinds = $kind === 'all' ? ['signin', 'signout', 'failed', 'blocked', 'content', 'accounts', 'roles', 'errors'] : [$kind];
    foreach ($kinds as $type) {
      if (in_array($type, ['signin', 'signout', 'failed', 'blocked'], TRUE)) {
        $prefix = match ($type) {
          'signin' => 'Session opened for ', 'signout' => 'Session closed for ',
          'failed' => 'Login attempt failed', 'blocked' => 'Flood control blocked login attempt',
        };
        $condition->condition($query->andConditionGroup()->condition('w.type', 'user')->condition('w.message', $query->getConnection()->escapeLike($prefix) . '%', 'LIKE'));
      }
      elseif ($type === 'errors') {
        $condition->condition('w.severity', RfcLogLevel::ERROR, '<=');
      }
      else {
        $condition->condition('w.type', ['content' => 'ob_content', 'accounts' => 'ob_account', 'roles' => 'ob_role'][$type]);
      }
    }
    return $query->condition($condition);
  }

  private function eventLabel(string $type, string $message, int $severity) {
    if ($type === 'user') {
      foreach (['Session opened' => 'Sign-in', 'Session closed' => 'Sign-out', 'Login attempt failed' => 'Failed sign-in', 'Flood control blocked' => 'Login block'] as $prefix => $label) {
        if (str_starts_with($message, $prefix)) {
          return $this->t($label);
        }
      }
    }
    return $this->t(match ($type) {
      'ob_content' => 'Content change', 'ob_account' => 'Account change', 'ob_role' => 'Role change', default => $severity <= RfcLogLevel::ERROR ? 'Error' : 'Activity',
    });
  }

  private function date(int $timestamp): string {
    return \Drupal::service('date.formatter')->format($timestamp, 'custom', 'j M Y, H:i T');
  }

  /**
   * Lightweight health checks; no updates, cron runs or reindexing are triggered.
   */
  private function health(): array {
    $last = (int) \Drupal::state()->get('system.cron_last', 0);
    $health = [[
      'label' => $this->t('Last cron run'),
      'value' => $last ? $this->date($last) : $this->t('No completed run recorded'),
      'attention' => !$last || $last < \Drupal::time()->getRequestTime() - 172800,
    ]];
    if ($this->moduleHandler()->moduleExists('search')) {
      foreach (\Drupal::service('search.search_page_repository')->getIndexableSearchPages() as $page) {
        $status = $page->getPlugin()->indexStatus();
        $health[] = [
          'label' => $this->t('Search: @name', ['@name' => $page->label()]),
          'value' => $this->t('@remaining of @total items awaiting indexing', ['@remaining' => $status['remaining'] ?? 0, '@total' => $status['total'] ?? 0]),
          'attention' => !empty($status['remaining']),
        ];
      }
    }
    return $health;
  }

}
