<?php

namespace Drupal\ob_site\EventSubscriber;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Routing\LocalRedirectResponse;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Redirects former menu page URLs to their menu hierarchy URLs.
 */
final class PresidentRedirectSubscriber implements EventSubscriberInterface {

  public static function getSubscribedEvents(): array {
    return [KernelEvents::REQUEST => ['onRequest', 34]];
  }

  public function onRequest(RequestEvent $event): void {
    $request = $event->getRequest();
    if (!$event->isMainRequest() || !in_array($request->getMethod(), ['GET', 'HEAD'], TRUE)) {
      return;
    }
    $path = rtrim($request->getPathInfo(), '/');
    $redirects = \Drupal::state()->get('ob_site.menu_url_redirects', []);
    $redirects['/te-beretitenti/the-president'] = '/our-government/te-beretitenti';
    $redirects['/te-beretitenti'] = '/our-government/te-beretitenti';
    if (!isset($redirects[$path])) {
      return;
    }
    $destination = $request->getBaseUrl() . $redirects[$path];
    if ($request->getQueryString()) {
      $destination .= '?' . $request->getQueryString();
    }
    $response = new LocalRedirectResponse($destination, 301);
    $response->addCacheableDependency((new CacheableMetadata())->setCacheContexts(['url.path', 'url.query_args']));
    $event->setResponse($response);
  }

}
