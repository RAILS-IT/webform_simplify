<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @WebformSimplifyElement(
 *     id = "webform_checkboxes_other",
 *     label = @Translation("Checkboxes other"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\WebformCheckboxesOther
 */
class WebformCheckboxesOther extends Checkboxes {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    $features = parent::getFeatures();
    unset($features['options_all']);

    return $features;
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    $map = parent::getFeaturePropertyMap();
    unset($map['options_all']);

    return $map;
  }

  /**
   * {@inheritdoc}
   */
  public function isOther(): bool {
    return TRUE;
  }

}
