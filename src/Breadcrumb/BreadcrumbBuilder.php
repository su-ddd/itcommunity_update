<?php

namespace Drupal\itcommunity_update\Breadcrumb;

use Drupal\Core\Breadcrumb\Breadcrumb;
use Drupal\Core\Breadcrumb\BreadcrumbBuilderInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Link;

// Define your class and implement BreadcrumbBuilderInterface 
class BreadcrumbBuilder implements BreadcrumbBuilderInterface {

  /**
   * {@inheritdoc}
   */
  public function applies(RouteMatchInterface $attributes) {

    $route_name = $attributes->getRouteName();

    // Determine if the current page id adding or editing a node
    // If yes, this breadcrumb applies
    if (isset($route_name) && (($route_name == 'node.add') || ($route_name == 'entity.node.edit_form'))) {
      return TRUE;
    }

    // Breadcrumb does not apply 
    return FALSE;
  }
 
  /**
   * {@inheritdoc}
   */
  public function build(RouteMatchInterface $route_match) {
    $breadcrumb = new Breadcrumb();

    // Add a link to the homepage as our first crumb.
    //$breadcrumb->addLink(Link::createFromRoute('Home', '<front>'));
 
    // Don't forget to add cache control by a route.
    // Otherwise all pages will have the same breadcrumb.
    $breadcrumb->addCacheContexts(['route']);
 
    // Return object of type breadcrumb.
    return $breadcrumb;
  }
}

