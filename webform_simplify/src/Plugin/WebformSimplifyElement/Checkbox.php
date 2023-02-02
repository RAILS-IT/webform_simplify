<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @WebformSimplifyElement(
 *     id = "checkbox",
 *     label = @Translation("Checkbox"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\Checkbox
 */
class Checkbox extends BooleanBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    $features = parent::getFeatures();
    $features['exclude_empty'] = $this->t('Exclude unselected checkbox');
    unset($features['unique']);
    unset($features['display']);

    return $features;
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    $map = parent::getFeaturePropertyMap();
    unset($map['unique']);

    return $map;
  }

}
