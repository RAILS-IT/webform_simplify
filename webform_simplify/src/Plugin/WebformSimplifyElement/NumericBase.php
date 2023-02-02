<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @see \Drupal\webform\Plugin\WebformElement\NumericBase
 */
abstract class NumericBase extends WebformSimplifyElementBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    return [
      'min' => $this->t('Minimum'),
      'max' => $this->t('Maximum'),
      'step' => $this->t('Steps'),
    ] + parent::getFeatures();
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    return [
      'min' => [
        'properties.number.number_container.min',
      ],
      'max' => [
        'properties.number.number_container.max',
      ],
      'step' => [
        'properties.number.number_container.step',
      ],
    ] + parent::getFeaturePropertyMap();
  }

}
