<?php

namespace Drupal\webform_simplify\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * @Annotation
 */
class WebformSimplifyElement extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

}
