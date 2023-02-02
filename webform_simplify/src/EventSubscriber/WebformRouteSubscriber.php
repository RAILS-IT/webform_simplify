<?php

namespace Drupal\webform_simplify\EventSubscriber;

use Drupal\Core\Routing\RouteBuildEvent;
use Drupal\Core\Routing\RoutingEvents;
use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Hide certain parts of webform settings by restricting access to routes.
 */
class WebformRouteSubscriber implements EventSubscriberInterface {

  /** @var \Drupal\Core\Session\AccountProxyInterface */
  protected $currentUser;

  public function __construct(
    AccountProxyInterface $currentUser
  ) {
    $this->currentUser = $currentUser;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents(): array {
    $events[RoutingEvents::ALTER][] = ['onAlterRoutes'];

    return $events;
  }

  public function onAlterRoutes(RouteBuildEvent $event): void {
    $collection = $event->getRouteCollection();

    if ($route = $collection->get('entity.webform.settings_form')) {
      $route->setRequirement('_permission', 'edit any webform settings+edit any webform form settings');
    }

    if ($route = $collection->get('entity.webform.settings_submissions')) {
      $route->setRequirement('_permission', 'edit any webform settings+edit any webform submission settings');
    }

    if ($route = $collection->get('entity.webform.settings_confirmation')) {
      $route->setRequirement('_permission', 'edit any webform settings+edit any webform confirmation settings');
    }

    if ($route = $collection->get('entity.webform.settings_assets')) {
      $route->setRequirement('_permission', 'edit any webform settings+edit any webform asset settings');
    }

    if ($route = $collection->get('entity.webform.settings_access')) {
      $route->setRequirement('_permission', 'edit any webform settings+edit any webform access settings');
    }

    $handlerRouteNames = [
      'entity.webform.handlers',
      'entity.webform.handler.add_email',
      'entity.webform.handler.edit_form',
      'entity.webform.handler.duplicate_form',
      'entity.webform.handler.delete_form',
      'entity.webform.handler.enable',
      'entity.webform.handler.disable',
    ];

    foreach ($handlerRouteNames as $routeName) {
      if ($route = $collection->get($routeName)) {
        $route->setRequirement('_permission', 'edit any webform settings+edit any webform handler settings');
      }
    }
  }

}
