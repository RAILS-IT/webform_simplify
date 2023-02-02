<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @see \Drupal\webform\Plugin\WebformElement\DateBase
 */
abstract class DateBase extends WebformSimplifyElementBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    return [
      'date_min_max' => $this->t('Date minimum/maximum'),
      'date_days' => $this->t('Date days of the week'),
    ] + parent::getFeatures();
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    return [
      'date_min_max' => [
        'properties.date.date_container.date_date_min',
        'properties.date.date_container.date_date_max',
        'properties.validation.date_min_max_message',
        'properties.validation.date_container',
      ],
      'date_days' => [
        'properties.date.date_container.date_date_max',
      ],
    ] + parent::getFeaturePropertyMap();
  }

}
