<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @WebformSimplifyElement(
 *     id = "webform_email_confirm",
 *     label = @Translation("Email confirm"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\WebformEmailConfirm
 */
class WebformEmailConfirm extends Email {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    $features = parent::getFeatures();
    $features['email_confirm'] = $this->t('Email confirm settings');
    unset($features['multiple']);
    unset($features['display']);

    return $features;
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    $map = parent::getFeaturePropertyMap();
    $map['email_confirm'] = [
      'properties.email_confirm',
    ];
    unset($map['multiple']);
    unset($map['display']);

    return $map;
  }

}
