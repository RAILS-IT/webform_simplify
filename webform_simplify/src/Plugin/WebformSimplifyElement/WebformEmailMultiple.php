<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @WebformSimplifyElement(
 *     id = "webform_email_multiple",
 *     label = @Translation("Email multiple"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\WebformEmailMultiple
 */
class WebformEmailMultiple extends Email {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    $features = parent::getFeatures();
    unset($features['multiple']);
    unset($features['display']);

    return $features;
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    $map = parent::getFeaturePropertyMap();
    unset($map['multiple']);
    unset($map['display']);

    return $map;
  }

}
