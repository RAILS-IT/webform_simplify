<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @WebformSimplifyElement(
 *     id = "textarea",
 *     label = @Translation("Textarea"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\Textarea
 */
class Textarea extends TextBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    return [
      'rows' => $this->t('Rows'),
    ] + parent::getFeatures();
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    return [
      'rows' => [
        'properties.form.size_container.rows',
      ],
    ] + parent::getFeaturePropertyMap();
  }

}
