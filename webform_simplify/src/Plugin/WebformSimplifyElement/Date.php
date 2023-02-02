<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @WebformSimplifyElement(
 *     id = "date",
 *     label = @Translation("Date"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\Date
 */
class Date extends DateBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    return [
      'datepicker' => $this->t('Use date picker'),
      'date_format' => $this->t('Date format'),
      'date_step' => $this->t('Step'),
    ] + parent::getFeatures();
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    return [
      'datepicker' => [
        'properties.date.datepicker',
        'properties.date.datepicker_button',
      ],
      'date_format' => [
        'properties.date.date_date_format',
      ],
      'date_step' => [
        'properties.date.date_container.step',
      ],
    ] + parent::getFeaturePropertyMap();
  }

}
