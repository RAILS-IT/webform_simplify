<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @WebformSimplifyElement(
 *     id = "checkboxes",
 *     label = @Translation("Checkboxes"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\Checkboxes
 */
class Checkboxes extends OptionsBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    return [
      'options_all' => $this->t("Include '@type of the above' option", ['@type' => $this->t('All')]),
      'options_none' => $this->t("Include '@type of the above' option", ['@type' => $this->t('None')]),
    ] + parent::getFeatures();
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    return [
      'options_all' => [
        'properties.options.options_all',
        'properties.options.options_all_container',
      ],
    ] + parent::getFeaturePropertyMap();
  }

}
