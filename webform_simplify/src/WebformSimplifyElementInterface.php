<?php

namespace Drupal\webform_simplify;

/**
 * Determines all features an element type provides and how they can be hidden.
 */
interface WebformSimplifyElementInterface {

  /**
   * Get all features of this element.
   *
   * @return array
   *   The feature ID as key and a label as value
   */
  public function getFeatures(): array;

  /**
   * Get all tabs that appear in the form of this element.
   *
   * @return array
   *   The value of the html ID (fragment) as key and a label as value
   */
  public function getTabs(): array;

  /**
   * Get all form properties associated with this elements' features.
   *
   * @return array
   *   The feature ID as key and an array of form selectors as value.
   *    Nested elements in form selectors are separated by dots (.).
   */
  public function getFeaturePropertyMap(): array;

}
