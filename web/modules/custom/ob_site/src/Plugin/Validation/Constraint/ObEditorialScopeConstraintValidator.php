<?php

namespace Drupal\ob_site\Plugin\Validation\Constraint;

use Drupal\node\NodeInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class ObEditorialScopeConstraintValidator extends ConstraintValidator {

  public function validate($value, Constraint $constraint): void {
    if ($value instanceof NodeInterface && ob_site_is_resources_editor(\Drupal::currentUser()) && !ob_site_editor_node_in_scope($value)) {
      $violation = $this->context->buildViolation($constraint->message);
      if ($value->hasField('field_resource_section')) {
        $violation->atPath('field_resource_section');
      }
      $violation->addViolation();
    }
  }

}
