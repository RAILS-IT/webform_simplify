<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @see \Drupal\webform\Plugin\WebformElement\ContainerBase
 */
abstract class ContainerBase extends WebformSimplifyElementBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    return [
      'randomize' => $this->t('Randomize elements'),
    ] + parent::getFeatures();
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    return [
      'randomize' => [
        'properties.element.randomize',
      ],
    ] + parent::getFeaturePropertyMap();
  }

}
