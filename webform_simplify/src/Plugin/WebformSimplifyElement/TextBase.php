<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @see \Drupal\webform\Plugin\WebformElement\TextBase
 */
abstract class TextBase extends WebformSimplifyElementBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    return [
      'minlength' => $this->t('Minlength'),
      'maxlength' => $this->t('Maxlength'),
      'size' => $this->t('Size'),
      'input_mask' => $this->t('Input masks'),
      'input_hide' => $this->t('Input hiding'),
      'pattern' => $this->t('Pattern'),
      'counter' => $this->t('Counter'),
    ] + parent::getFeatures();
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    return [
      'minlength' => [
        'properties.form.length_container.minlength',
      ],
      'maxlength' => [
        'properties.form.length_container.maxlength',
      ],
      'size' => [
        'properties.form.size_container.size',
      ],
      'input_mask' => [
        'properties.form.input_mask',
      ],
      'input_hide' => [
        'properties.form.input_hide',
      ],
      'pattern' => [
        'properties.validation.pattern',
        'properties.validation.pattern_error',
      ],
      'counter' => [
        'properties.validation.counter_type',
        'properties.validation.counter_container',
        'properties.validation.counter_message_container',
      ],
    ] + parent::getFeaturePropertyMap();
  }

}
