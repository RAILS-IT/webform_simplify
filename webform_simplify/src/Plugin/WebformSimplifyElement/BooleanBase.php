<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @see \Drupal\webform\Plugin\WebformElement\BooleanBase
 */
abstract class BooleanBase extends WebformSimplifyElementBase {

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
