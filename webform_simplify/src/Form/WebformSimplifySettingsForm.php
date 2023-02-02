<?php

namespace Drupal\webform_simplify\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class WebformSimplifySettingsForm extends FormBase {

  /** @var \Drupal\webform_simplify\WebformSimplifyElementManager */
  protected $webformSimplifyElementManager;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->configFactory = $container->get('config.factory');
    $instance->messenger = $container->get('messenger');
    $instance->webformSimplifyElementManager = $container->get('plugin.manager.webform_simplify.element');

    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'webform_simplify_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $config = $this->configFactory->get('webform_simplify.settings');

    $form['general_settings'] = [
      '#title' => $this->t('General settings'),
      '#type' => 'fieldset',
    ];

    $form['general_settings']['disable_help'] = [
      '#title' => $this->t('Disable help sections'),
      '#type' => 'checkbox',
      '#default_value' => $config->get('disable_help'),
    ];

    $form['element_settings'] = [
      '#title' => $this->t('Element settings'),
      '#type' => 'fieldset',
      '#tree' => TRUE,
    ];

    foreach ($this->webformSimplifyElementManager->getDefinitions() as $definition) {
      /** @var \Drupal\webform_simplify\WebformSimplifyElementInterface $simplifyElement */
      $simplifyElement = $this->webformSimplifyElementManager->createInstance($definition['id']);

      $form['element_settings'][$definition['id']] = [
        '#title' => $definition['label'],
        '#type' => 'details',
        '#tree' => TRUE,
        '#open' => FALSE,
      ];

      $tabs = $simplifyElement->getTabs();
      $disabledTabs = $config->get(sprintf('element_settings.%s.disabled_tabs', $definition['id'])) ?? [];
      $enabledTabs = array_diff(array_keys($tabs), $disabledTabs);

      $form['element_settings'][$definition['id']]['tabs'] = [
        '#title' => $this->t('Tabs'),
        '#type' => 'checkboxes',
        '#options' => $tabs,
        '#default_value' => $enabledTabs,
      ];

      $features = $simplifyElement->getFeatures();
      $disabledFeatures = $config->get(sprintf('element_settings.%s.disabled_features', $definition['id'])) ?? [];
      $enabledFeatures = array_diff(array_keys($features), $disabledFeatures);

      $form['element_settings'][$definition['id']]['features'] = [
        '#title' => $this->t('Features'),
        '#type' => 'checkboxes',
        '#options' => $features,
        '#default_value' => $enabledFeatures,
      ];
    }

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save configuration'),
      '#button_type' => 'primary',
    ];

    // By default, render the form using system-config-form.html.twig.
    $form['#theme'] = 'system_config_form';

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $config = $this->configFactory->getEditable('webform_simplify.settings');
    $values = $form_state->cleanValues()->getValues();

    $config->set('disable_help', $values['disable_help']);

    foreach ($values['element_settings'] as $element => $settings) {
      $disabledTabs = array_filter(
            $settings['tabs'],
            function ($value) {
              return $value === 0;
            }
        );

      $config->set(
            sprintf('element_settings.%s.disabled_tabs', $element),
            array_keys($disabledTabs)
        );

      $disabledFeatures = array_filter(
            $settings['features'],
            function ($value) {
              return $value === 0;
            }
        );

      $config->set(
            sprintf('element_settings.%s.disabled_features', $element),
            array_keys($disabledFeatures)
        );
    }

    // Clean up config.
    $elementSettings = $config->get('element_settings');
    foreach ($elementSettings as $element => $settings) {
      if (($settings['disabled_tabs'] ?? []) === [] && ($settings['disabled_features'] ?? []) === []) {
        unset($elementSettings[$element]);
      }
    }
    $config->set('element_settings', $elementSettings);

    $config->save();
    $this->messenger->addStatus($this->t('The configuration options have been saved.'));
  }

}
