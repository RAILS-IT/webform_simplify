<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @WebformSimplifyElement(
 *     id = "datetime",
 *     label = @Translation("Date/time"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\DateTime
 */
class DateTime extends DateBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    return [
      'date_element' => $this->t('Date element'),
      'date_datepicker_button' => $this->t('Show date picker button'),
      'date_placeholder' => $this->t('Date placeholder'),
      'date_format' => $this->t('Date format'),
      'date_year_range' => $this->t('Date year range'),
      'date_time_element' => $this->t('Time element'),
      'date_time_placeholder' => $this->t('Time placeholder'),
      'date_time_format' => $this->t('Time format'),
      'date_time_min_max' => $this->t('Time minimum/maximum'),
      'date_time_step' => $this->t('Time step'),
    ] + parent::getFeatures();
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    return [
      'date_element' => [
        'properties.date.date_date_element',
        'properties.date.date_date_element_datetime_warning',
        'properties.date.date_date_element_none_warning',
      ],
      'date_datepicker_button' => [
        'properties.date.date_date_datepicker_button',
      ],
      'date_placeholder' => [
        'properties.date.date_date_placeholder',
      ],
      'date_format' => [
        'properties.date.date_date_format',
      ],
      'date_year_range' => [
        'properties.date.date_year_range',
      ],
      'date_time_element' => [
        'properties.time.date_time_element',
      ],
      'date_time_placeholder' => [
        'properties.time.date_time_placeholder',
      ],
      'date_time_format' => [
        'properties.time.date_time_format',
      ],
      'date_time_min_max' => [
        'properties.time.date_time_container',
      ],
      'date_time_step' => [
        'properties.time.date_time_step',
      ],
    ] + parent::getFeaturePropertyMap();
  }

}
