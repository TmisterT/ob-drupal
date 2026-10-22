<?php

namespace Drupal\ob_site\Plugin\Validation\Constraint;

use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\Validation\Attribute\Constraint;
use Symfony\Component\Validator\Constraint as SymfonyConstraint;

#[Constraint(id: 'ObEditorialScope', label: new TranslatableMarkup('News and resources editorial scope'), type: 'entity:node')]
final class ObEditorialScopeConstraint extends SymfonyConstraint {
  public string $message = 'Choose Gazettes & Instruments or Information Library. This account can manage only news, public notices and those resource sections.';
}
