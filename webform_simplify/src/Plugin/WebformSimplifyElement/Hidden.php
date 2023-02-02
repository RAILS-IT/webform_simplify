<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @WebformSimplifyElement(
 *     id = "hidden",
 *     label = @Translation("Hidden"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\Hidden
 */
class Hidden extends TextBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    $features = parent::getFeatures();
    unset($features['prepopulate']);
    unset($features['flex']);
    unset($features['conditional_logic']);
    unset($features['admin']);

    return $features;
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    $map = parent::getFeaturePropertyMap();
    unset($map['prepopulate']);
    unset($map['flex']);
    unset($map['conditional_logic']);
    unset($map['admin']);

    return $map;
  }

}
