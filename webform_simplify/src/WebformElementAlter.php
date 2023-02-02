<?php

namespace Drupal\webform_simplify;

use Drupal\Component\Utility\NestedArray;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Render\Element;
use Drupal\Core\Session\AccountProxyInterface;

/**
 * Hide certain parts of element forms.
 */
class WebformElementAlter {

  /** @var \Drupal\Core\Session\AccountProxyInterface */
  protected $currentUser;
  /** @var \Drupal\Core\Config\ConfigFactoryInterface */
  protected $configFactory;
  /** @var \Drupal\webform_simplify\WebformSimplifyElementManager */
  protected $webformSimplifyElementManager;

  public function __construct(
    AccountProxyInterface $currentUser,
    ConfigFactoryInterface $configFactory,
    WebformSimplifyElementManager $webformSimplifyElementManager
  ) {
    $this->currentUser = $currentUser;
    $this->configFactory = $configFactory;
    $this->webformSimplifyElementManager = $webformSimplifyElementManager;
  }

  /**
   * Hide certain parts of element forms.
   */
  public function alter(array &$form): void {
    if ($this->currentUser->hasPermission('edit any webform element configuration')) {
      return;
    }

    $config = $this->configFactory->get('webform_simplify.settings');
    $element = $form['properties']['type']['#value'];

    if (!$this->webformSimplifyElementManager->hasDefinition($element)) {
      return;
    }

    $settings = $config->get(sprintf('element_settings.%s', $element)) ?? [];
    /** @var \Drupal\webform_simplify\WebformSimplifyElementInterface $simplifyElement */
    $simplifyElement = $this->webformSimplifyElementManager->createInstance($element);

    foreach ($settings['disabled_tabs'] as $tab) {
      $this->hideTab($form, $tab);
    }

    foreach ($settings['disabled_features'] as $feature) {
      $this->hideFeature($form, $simplifyElement, $feature);
    }
  }

  /**
   * Hide a certain tab from an element form.
   */
  protected function hideTab(array &$form, string $fragment): void {
    if (!isset($form['properties']['tabs']['items']['#items'])) {
      return;
    }

    foreach ($form['properties']['tabs']['items']['#items'] as $key => $tab) {
      /** @var \Drupal\Core\Url $url */
      $url = $tab['#url'];
      if ($url->getOption('fragment') === $fragment) {
        unset($form['properties']['tabs']['items']['#items'][$key]);
      }
    }
  }

  /**
   * Hide a certain feature from an element form.
   */
  protected function hideFeature(array &$form, WebformSimplifyElementInterface $simplifyElement, string $feature): void {
    $map = $simplifyElement->getFeaturePropertyMap();

    foreach ($map[$feature] as $property) {
      $parents = explode('.', $property);

      if (!NestedArray::keyExists($form, $parents)) {
        continue;
      }

      // Hide element.
      $element = &NestedArray::getValue($form, $parents);
      $element['#access'] = FALSE;

      // Hide parent if empty.
      array_pop($parents);
      $elementParent = &NestedArray::getValue($form, $parents);
      $this->hideIfChildrenAreEmpty($elementParent);
    }
  }

  /**
   * Hide a container if all its children are hidden.
   */
  protected function hideIfChildrenAreEmpty(array &$form): void {
    $children = Element::children($form);
    $empty = TRUE;

    foreach ($children as $child) {
      if (!isset($form[$child]['#access']) || $form[$child]['#access'] === TRUE) {
        $empty = FALSE;
      }
    }

    if ($empty) {
      $form['#access'] = FALSE;
    }
  }

}
