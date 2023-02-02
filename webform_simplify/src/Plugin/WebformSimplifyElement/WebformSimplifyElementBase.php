<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

use Drupal\Core\Plugin\PluginBase;
use Drupal\webform_simplify\WebformSimplifyElementInterface;

/**
 * @see \Drupal\webform\Plugin\WebformElementBase
 */
abstract class WebformSimplifyElementBase extends PluginBase implements WebformSimplifyElementInterface {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    return [
      'type' => $this->t('Type'),
      'title' => $this->t('Title'),
      'default_value' => $this->t('Default value'),
      'multiple' => $this->t('Multiple'),
      'description' => $this->t('Description'),
      'help' => $this->t('Help'),
      'more' => $this->t('More'),
      'title_display' => $this->t('Title display'),
      'description_display' => $this->t('Description display'),
      'help_display' => $this->t('Help display'),
      'field_prefix' => $this->t('Field prefix'),
      'field_suffix' => $this->t('Field suffix'),
      'placeholder' => $this->t('Placeholder'),
      'autocomplete' => $this->t('Autocomplete'),
      'disabled' => $this->t('Disabled'),
      'readonly' => $this->t('Readonly'),
      'prepopulate' => $this->t('Prepopulate'),
      'required' => $this->t('Required'),
      'unique' => $this->t('Unique'),
      'flex' => $this->t('Flexbox item'),
      'conditional_logic' => $this->t('Conditional logic'),
      'wrapper_attributes' => $this->t('Wrapper attributes'),
      'element_attributes' => $this->t('Element attributes'),
      'label_attributes' => $this->t('Label attributes'),
      'display' => $this->t('Submission display'),
      'admin' => $this->t('Administration'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getTabs(): array {
    return [
      'webform-tab--general' => $this->t('General'),
      'webform-tab--conditions' => $this->t('Conditions'),
      'webform-tab--advanced' => $this->t('Advanced'),
      'webform-tab--access' => $this->t('Access'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    return [
      'type' => [
        'properties.element.type',
      ],
      'title' => [
        'properties.element.title',
      ],
      'default_value' => [
        'properties.default',
      ],
      'multiple' => [
        'properties.element.multiple',
        'properties.multiple',
      ],
      'description' => [
        'properties.element_description.description',
      ],
      'help' => [
        'properties.element_description.help',
      ],
      'more' => [
        'properties.element_description.more',
      ],
      'title_display' => [
        'properties.form.display_container.title_display',
        'properties.form.title_display_message',
      ],
      'description_display' => [
        'properties.form.display_container.description_display',
      ],
      'help_display' => [
        'properties.form.display_container.help_display',
      ],
      'field_prefix' => [
        'properties.form.field_container.field_prefix',
      ],
      'field_suffix' => [
        'properties.form.field_container.field_suffix',
      ],
      'placeholder' => [
        'properties.form.placeholder',
      ],
      'autocomplete' => [
        'properties.form.autocomplete',
      ],
      'disabled' => [
        'properties.form.disabled',
      ],
      'readonly' => [
        'properties.form.readonly',
      ],
      'prepopulate' => [
        'properties.form.prepopulate',
      ],
      'required' => [
        'properties.validation.required_container',
      ],
      'unique' => [
        'properties.validation.unique_container',
        'properties.validation.unique_error',
      ],
      'flex' => [
        'properties.flex',
      ],
      'conditional_logic' => [
        'properties.conditional_logic',
      ],
      'wrapper_attributes' => [
        'properties.wrapper_attributes',
      ],
      'element_attributes' => [
        'properties.element_attributes',
      ],
      'label_attributes' => [
        'properties.label_attributes',
      ],
      'display' => [
        'properties.display',
      ],
      'admin' => [
        'properties.admin',
      ],
    ];
  }

}
