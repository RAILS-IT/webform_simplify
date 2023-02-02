<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @WebformSimplifyElement(
 *     id = "webform_select_other",
 *     label = @Translation("Select other"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\WebformSelectOther
 */
class WebformSelectOther extends Select {

  /**
   * {@inheritdoc}
   */
  public function isOther(): bool {
    return TRUE;
  }

}
