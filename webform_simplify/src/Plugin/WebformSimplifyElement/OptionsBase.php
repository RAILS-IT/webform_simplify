<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @see \Drupal\webform\Plugin\WebformElement\OptionsBase
 */
abstract class OptionsBase extends WebformSimplifyElementBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    $features = [
      'options' => $this->t('Options'),
      'options_display' => $this->t('Options display'),
      'empty_option' => $this->t('Empty option label'),
      'empty_value' => $this->t('Empty option value'),
      'sort_options' => $this->t('Sort options'),
      'randomize' => $this->t('Randomize options'),
      'properties' => $this->t('Options (custom) properties'),
    ] + parent::getFeatures();

    if ($this->isOther()) {
      $features += [
        'other_type' => $this->t('Other type'),
        'other_label' => $this->t('Other option label'),
        'other_title' => $this->t('Other title'),
        'other_placeholder' => $this->t('Other placeholder'),
        'other_description' => $this->t('Other description'),
        'other_prefix' => $this->t('Other field prefix'),
        'other_suffix' => $this->t('Other field suffix'),
        'other_size' => $this->t('Other size'),
        'other_maxlength' => $this->t('Other maxlength'),
        'other_rows' => $this->t('Other rows'),
        'other_min' => $this->t('Other minimum'),
        'other_max' => $this->t('Other maximum'),
        'other_step' => $this->t('Other steps'),
        'other_count' => $this->t('Other count'),
      ];
    }

    return $features;
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    $map = [
      'options' => [
        'properties.options.options',
      ],
      'options_display' => [
        'properties.options.options_display_container',
      ],
      'empty_option' => [
        'properties.options.empty_option',
      ],
      'empty_value' => [
        'properties.options.empty_value',
      ],
      'sort_options' => [
        'properties.options.sort_options',
      ],
      'randomize' => [
        'properties.options.options_randomize',
      ],

      'properties' => [
        'properties.options_properties',
      ],
    ] + parent::getFeaturePropertyMap();

    if ($this->isOther()) {
      $map += [
        'other_type' => [
          'properties.options_other.other__type',
        ],
        'other_label' => [
          'properties.options_other.other__option_label',
        ],
        'other_title' => [
          'properties.options_other.other__title',
        ],
        'other_placeholder' => [
          'properties.options_other.other__placeholder',
        ],
        'other_description' => [
          'properties.options_other.other__description',
        ],
        'other_prefix' => [
          'properties.options_other.other__field_container.other__field_prefix',
        ],
        'other_suffix' => [
          'properties.options_other.other__field_container.other__field_suffix',
        ],
        'other_size' => [
          'properties.options_other.other__size_container.other__size',
        ],
        'other_maxlength' => [
          'properties.options_other.other__size_container.other__maxlength',
        ],
        'other_rows' => [
          'properties.options_other.other__size_container.other__rows',
        ],
        'other_min' => [
          'properties.options_other.other__number_container.other__min',
        ],
        'other_max' => [
          'properties.options_other.other__number_container.other__max',
        ],
        'other_step' => [
          'properties.options_other.other__number_container.other__step',
        ],
        'other_count' => [
          'properties.options_other.other__textbase_container',
        ],
      ];
    }

    return $map;
  }

  /**
   * {@inheritdoc}
   */
  public function isOther(): bool {
    return FALSE;
  }

}
