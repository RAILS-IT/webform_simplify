<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @WebformSimplifyElement(
 *     id = "webform_autocomplete",
 *     label = @Translation("Autocomplete"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\WebformAutocomplete
 *
 * @todo Add element-specific properties
 */
class WebformAutocomplete extends TextBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    $features = parent::getFeatures();
    unset($features['autocomplete']);

    return $features;
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    $map = parent::getFeaturePropertyMap();
    unset($map['autocomplete']);

    return $map;
  }

}
