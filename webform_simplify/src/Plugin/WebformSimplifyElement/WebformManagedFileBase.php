<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @see \Drupal\webform\Plugin\WebformElement\WebformManagedFileBase
 */
abstract class WebformManagedFileBase extends WebformSimplifyElementBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    $features = parent::getFeatures();
    unset($features['prepopulate']);
    unset($features['default_value']);

    return [
      'uri_scheme' => $this->t('File upload destination'),
      'file_help' => $this->t('File upload help display'),
      'file_placeholder' => $this->t('File upload placeholder'),
      'file_preview' => $this->t('File upload preview (Authenticated users only)'),
      'max_filesize' => $this->t('Maximum file size'),
      'file_extensions' => $this->t('Allowed file extensions'),
      'file_name' => $this->t('Rename files'),
      'file_sanitize' => $this->t('Sanitize file name'),
      'file_multiple' => $this->t('Multiple'),
      'file_button' => $this->t('Replace file upload input with an upload button'),
    ] + $features;
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    $map = parent::getFeaturePropertyMap();
    unset($map['prepopulate']);
    unset($map['default_value']);

    return [
      'uri_scheme' => [
        'properties.file.uri_scheme',
        'properties.file.uri_public_warning',
        'properties.file.uri_private_warning',
      ],
      'file_help' => [
        'properties.file.file_help',
      ],
      'file_placeholder' => [
        'properties.file.file_placeholder',
      ],
      'file_preview' => [
        'properties.file.file_preview',
      ],
      'max_filesize' => [
        'properties.file.max_filesize',
      ],
      'file_extensions' => [
        'properties.file.file_extensions',
      ],
      'file_name' => [
        'properties.file.file_name',
      ],
      'file_sanitize' => [
        'properties.file.sanitize',
        'properties.file.file_name_warning',
      ],
      'file_multiple' => [
        'properties.file.multiple',
      ],
      'file_button' => [
        'properties.file.button',
        'properties.file.button__title',
        'properties.file.button__attributes',
      ],
    ] + $map;
  }

}
