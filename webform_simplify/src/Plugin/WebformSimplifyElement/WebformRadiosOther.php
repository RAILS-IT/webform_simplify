<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @WebformSimplifyElement(
 *     id = "webform_radios_other",
 *     label = @Translation("Radios other"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\WebformRadiosOther
 */
class WebformRadiosOther extends Radios {

  /**
   * {@inheritdoc}
   */
  public function isOther(): bool {
    return TRUE;
  }

}
