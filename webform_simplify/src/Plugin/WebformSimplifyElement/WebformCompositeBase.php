<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @see \Drupal\webform\Plugin\WebformElement\WebformCompositebase
 */
abstract class WebformCompositeBase extends WebformSimplifyElementBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    return [
      'return_value' => $this->t('Return value'),
    ] + parent::getFeatures();
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    return [
      'return_value' => [
        'properties.default.return_value',
      ],
    ] + parent::getFeaturePropertyMap();
  }

}
