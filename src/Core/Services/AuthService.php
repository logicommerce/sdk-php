<?php declare(strict_types=1);

namespace SDK\Core\Services;

use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Enums\Resource;
use SDK\Core\Registry;

/**
 * This is the auth service class.
 * This class will retrieve the auth token (JWT) from LogiCommerce API and return it.
 *
 * @see AuthService::getToken()
 * @see AuthService::refreshToken()
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Core\Services
 */
final class AuthService extends Service {
    use ServiceTrait;

    private const REGISTRY_KEY = Registry::AUTH_MODEL;

    /**
     * Returns the auth token (JWT) for LogiCommerce API
     *
     * @return array
     */
    public function getToken(): array {
        return $this->call((new RequestBuilder())->path(Resource::AUTH)->method(self::GET)->build());
    }

    /**
     * Refresh the auth token (JWT) for LogiCommerce API
     *
     * @return array
     */
    public function refreshToken(): array {
        return $this->call((new RequestBuilder())->path(Resource::REFRESH_TOKEN)->method(self::GET)->build());
    }
}
