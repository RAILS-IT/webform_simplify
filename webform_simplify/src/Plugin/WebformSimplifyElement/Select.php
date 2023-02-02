<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @WebformSimplifyElement(
 *     id = "select",
 *     label = @Translation("Select"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\Select
 */
class Select extends OptionsBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    return [
      'select2' => $this->t('Select2'),
      'choices' => $this->t('Choice.js'),
      'chosen' => $this->t('Chosen'),
    ] + parent::getFeatures();
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    return [
      'select2' => [
        'properties.options.select2',
      ],
      'choices' => [
        'properties.options.choices',
      ],
      'chosen' => [
        'properties.options.chosen',
      ],
    ] + parent::getFeaturePropertyMap();
  }

}
