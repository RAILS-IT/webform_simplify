<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @WebformSimplifyElement(
 *     id = "webform_image_file",
 *     label = @Translation("Image file"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\WebformImageFile
 */
class WebformImageFile extends WebformManagedFileBase implements ContainerFactoryPluginInterface {

  /** @var \Drupal\Core\Extension\ModuleHandlerInterface*/
  protected $moduleHandler;

  /**
   * {@inheritdoc}
   */
  public static function create(
    ContainerInterface $container,
    array $configuration,
    $plugin_id,
    $plugin_definition
  ) {
    $instance = new static($configuration, $plugin_id, $plugin_definition);
    $instance->moduleHandler = $container->get('module_handler');

    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    $features = parent::getFeatures();

    $features['max_resolution'] = $this->t('Maximum image resolution');
    $features['min_resolution'] = $this->t('Minimum image resolution');

    if ($this->moduleHandler->moduleExists('image')) {
      $features['attachment_image_style'] = $this->t('Attachment image style');
    }

    return $features;
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    $map = parent::getFeaturePropertyMap();

    $map['max_resolution'] = [
      'properties.image.max_resolution',
    ];
    $map['min_resolution'] = [
      'properties.image.min_resolution',
    ];

    if ($this->moduleHandler->moduleExists('image')) {
      $map['attachment_image_style'] = [
        'properties.image.attachment_image_style',
      ];
      ;
    }

    return $map;
  }

}
