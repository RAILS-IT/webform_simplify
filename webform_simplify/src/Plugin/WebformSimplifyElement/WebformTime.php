<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @WebformSimplifyElement(
 *     id = "webform_time",
 *     label = @Translation("Time"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\WebformTime
 */
class WebformTime extends WebformSimplifyElementBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    return [
      'timepicker' => $this->t('Time step'),
      'time_format' => $this->t('Time format'),
      'time_min_max' => $this->t('Minimum / maximum time'),
      'time_step' => $this->t('Step'),
    ] + parent::getFeatures();
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    return [
      'timepicker' => [
        'properties.time.timepicker',
      ],
      'time_format' => [
        'properties.time.time_format',
      ],
      'time_min_max' => [
        'properties.time.time_container',
      ],
      'time_step' => [
        'properties.time.step',
      ],
    ] + parent::getFeaturePropertyMap();
  }

}
