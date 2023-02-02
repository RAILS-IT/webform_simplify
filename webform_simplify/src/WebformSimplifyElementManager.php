<?php

namespace Drupal\webform_simplify;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * The WebformSimplifyElement plugin manager.
 */
class WebformSimplifyElementManager extends DefaultPluginManager {

  /**
   * {@inheritdoc}
   */
  public function __construct(
    \Traversable $namespaces,
    CacheBackendInterface $cache_backend,
    ModuleHandlerInterface $module_handler
  ) {
    parent::__construct(
          'Plugin/WebformSimplifyElement',
          $namespaces,
          $module_handler,
          'Drupal\webform_simplify\WebformSimplifyElementInterface',
          'Drupal\webform_simplify\Annotation\WebformSimplifyElement'
      );

    $this->alterInfo('webform_simplify_element');
    $this->setCacheBackend($cache_backend, 'webform_simplify_elements');
  }

}
