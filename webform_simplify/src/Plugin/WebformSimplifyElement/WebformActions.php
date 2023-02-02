<?php

namespace Drupal\webform_simplify\Plugin\WebformSimplifyElement;

/**
 * @WebformSimplifyElement(
 *     id = "webform_actions",
 *     label = @Translation("Submit button(s)"),
 *     provider = "webform",
 * )
 *
 * @see \Drupal\webform\Plugin\WebformElement\WebformActions
 */
class WebformActions extends BooleanBase {

  /**
   * {@inheritdoc}
   */
  public function getFeatures(): array {
    $features = parent::getFeatures();

    foreach ($this->getButtons() as $name => $button) {
      $tArgs = [
        '@title' => $button['title'],
        '@label' => $button['label'],
        '%label' => $button['label'],
      ];

      $features[sprintf('%s_hide', $name)] = $this->t('Hide @label button', $tArgs);
      $features[sprintf('%s_label', $name)] = $this->t('@title button label', $tArgs);
      $features[sprintf('%s_attributes', $name)] = $this->t('@title button', $tArgs);
    }

    $features['delete_dialog'] = $this->t('Open delete confirmation form in a modal dialog.');

    return $features;
  }

  /**
   * {@inheritdoc}
   */
  public function getFeaturePropertyMap(): array {
    $map = parent::getFeaturePropertyMap();

    foreach ($this->getButtons() as $name => $button) {
      $map[sprintf('%s_hide', $name)] = [
        sprintf('properties.%s_settings.%s_hide', $name, $name),
        sprintf('properties.%s_settings.%s_hide_message', $name, $name),
      ];
      $map[sprintf('%s_label', $name)] = [
        sprintf('properties.%s_settings.%s__label', $name, $name),
      ];
      $map[sprintf('%s_attributes', $name)] = [
        sprintf('properties.%s_settings.%s__attributes', $name, $name),
      ];
    }

    $map['delete_dialog'] = [
      'properties.delete_settings.delete__dialog',
    ];

    return $map;
  }

  /**
   * {@inheritdoc}
   */
  protected function getButtons(): array {
    return [
      'submit' => [
        'title' => $this->t('Submit'),
        'label' => $this->t('submit'),
      ],
      'reset' => [
        'title' => $this->t('Reset'),
        'label' => $this->t('reset'),
      ],
      'draft' => [
        'title' => $this->t('Draft'),
        'label' => $this->t('draft'),
      ],
      'update' => [
        'title' => $this->t('Update'),
        'label' => $this->t('update'),
      ],
      'wizard_prev' => [
        'title' => $this->t('Wizard previous'),
        'label' => $this->t('wizard previous'),
      ],
      'wizard_next' => [
        'title' => $this->t('Wizard next'),
        'label' => $this->t('wizard next'),
      ],
      'preview_prev' => [
        'title' => $this->t('Preview previous'),
        'label' => $this->t('preview previous'),
      ],
      'preview_next' => [
        'title' => $this->t('Preview next'),
        'label' => $this->t('preview next'),
      ],
      'delete' => [
        'title' => $this->t('Delete'),
        'label' => $this->t('delete'),
      ],
    ];
  }

}
