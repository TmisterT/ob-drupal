<?php

declare(strict_types=1);

use Drupal\webform\Entity\Webform;
use Symfony\Component\Yaml\Yaml;

/**
 * Installs the nomination form and connects existing Awards service pages.
 */
function ob_site_ensure_awards_nomination_form(): void {
  if (!Webform::load('honours_awards_nomination')) {
    $data = Yaml::parseFile(DRUPAL_ROOT . '/../config/sync/webform.webform.honours_awards_nomination.yml');
    Webform::create($data)->save();
  }

  $storage = \Drupal::entityTypeManager()->getStorage('node');
  foreach ($storage->loadByProperties(['type' => 'honours_awards']) as $node) {
    foreach ($node->getTranslationLanguages() as $language) {
      $translation = $node->getTranslation($language->getId());
      $translation->set('field_service_link', [
        'uri' => 'internal:/service/awards/nominate',
        'title' => (string) t('Submit a nomination', [], ['langcode' => $language->getId()]),
      ]);
    }
    $node->setNewRevision(TRUE);
    $node->setRevisionLogMessage('Connect the online Honours and Awards nomination form.');
    $node->save();
  }
}
