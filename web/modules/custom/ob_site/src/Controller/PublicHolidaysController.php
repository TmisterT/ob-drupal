<?php

namespace Drupal\ob_site\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\ob_site\HolidayArchive;

/**
 * The national annual holiday directory.
 */
final class PublicHolidaysController extends ControllerBase {

  public function build(): array {
    return HolidayArchive::build();
  }

}
