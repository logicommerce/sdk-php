<?php

declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Enums\Resource;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\Connection;
use SDK\Core\Resources\Environment;
use SDK\Dtos\Common\Route;

/**
 * This is the routes service class.
 * This class will retrieve the routes from LogiCommerce API and transform them to objects.
 * All the needed routes operations previous to Framework must be done here.
 *
 * @see RouteService::getRoute()
 * @see Route
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class RouteService extends Service {
    use ServiceTrait;

    private const REGISTRY_KEY = Registry::ROUTE_MODEL;

    /**
     * Returns the url for the given route
     *
     * @return Route
     */
    public function getRoute(): Route {
        $route = $this->getResourceElement(Route::class, Resource::ROUTE, $this->getParams());
        Registry::set(Registry::PAGE_TYPE, $route->getType());
        return $route;
    }

    protected function getParams(string $path = null, string $host = null, string $protocol = null) {
        if (is_null($path)) {
            $path = filter_input(INPUT_GET, URL_ROUTE, FILTER_SANITIZE_SPECIAL_CHARS, [FILTER_FLAG_STRIP_HIGH, FILTER_FLAG_STRIP_LOW]);
        }
        if (is_null($host)) {
            $host = Environment::get('COMMERCE_HOST') ?: Connection::getHost();
        }
        if (is_null($protocol)) {
            $protocol = Environment::get('COMMERCE_PROTOCOL') ?: (Connection::isHttps() ? 'https' : 'http');
        }

        $params = [
            'protocol' => $protocol,
            'path' => $path,
            'host' => $host
        ];

        if (isset($_GET['basketToken'])) {
            $params['basketToken'] = $_GET['basketToken'];
        }

        return $params;
    }
}
