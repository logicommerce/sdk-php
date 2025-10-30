<?php

declare(strict_types=1);

namespace SDK\Core;

use SDK\Core\Exceptions\ApplicationException;
use SDK\Core\Services\AuthService;
use SDK\Core\Resources\Cookie;
use SDK\Core\Resources\Environment;
use SDK\Core\Resources\Header;
use SDK\Core\Resources\Redis;
use SDK\Core\Resources\Server;

/**
 * This is the Core Application class in the SDK Core package.
 * All setting/getting operations
 * are done through this class.
 *
 * @see Application::startApplication()
 * @see Application::get()
 * @see Application::getToken()
 * @see Application::getEcommerce()
 *
 * @package SDK\Core
 */
abstract class Application {

    private const TOKEN = 'token';

    private const REFRESHTOKEN = 'refreshToken';

    protected const ECOMMERCE = 'ecommerce';

    protected const PLUGINS = 'plugins';

    protected const LICENSES = 'licenses';

    /**
     * Variable that will contains all the information that must be on Application scope
     *
     * @var array
     */
    private array $data = [];

    private string $tokenStorage = Cookie::class;

    private string $tokenKey = self::TOKEN;

    /**
     * Constructor.
     */
    private function __construct() {
        $useRedisCache = Redis::isEnabled();
        $commerceUid = Environment::get('COMMERCE_ID');
        if ($useRedisCache) {
            if (is_null($commerceUid)) {
                throw new ApplicationException(
                    'The definition of the "COMMERCE_ID" is required when the application uses Redis',
                    ApplicationException::COMMERCE_ID_NOT_DEFINED
                );
            }
            $this->tokenStorage = Redis::class;
            $this->tokenKey = 'TOKEN:' . self::TOKEN;
        }
    }

    private function __clone() {
        // Prevent clone this object
    }

    /**
     * Returns the Application instance.
     * If is not setted, this method will set it.
     *
     * @return Application|NULL
     */
    public static function getInstance(): ?self {
        if (!Registry::exist(Registry::APPLICATION)) {
            if (static::class === self::class) {
                return null;
            }
            Registry::set(Registry::APPLICATION, new static());
        }
        return Registry::get(Registry::APPLICATION);
    }

    /**
     * Start ecommerce Application
     * Create cookie with the user identifier
     *
     * @return void
     * @throws ApplicationException
     */
    public function startApplication(callable $setConstants = null): void {
        $this->prepareResponseHeaders();
        if ($this->hasInValidData()) {
            $this->setToken();
        }
        if (!is_null($setConstants)) {
            $setConstants();
        }
        $this->setSettings();
        $this->setLicenses();
    }

    private function prepareResponseHeaders(): void {
        Header::set('X-Served-By', Server::get('SERVER_ADDR'));
    }

    private function getAuth(): array {
        $this->set($this->tokenKey, '');
        return AuthService::getInstance()->getToken();
    }

    private function getRefreshAuth(): array {
        return AuthService::getInstance()->refreshToken();
    }

    private function setAuth(array $auth): void {
        if (isset($auth[self::TOKEN])) {
            $this->setApplicationToken($auth[self::TOKEN]);
        }

        if (isset($auth[self::REFRESHTOKEN])) {
            $this->set(self::REFRESHTOKEN, $auth[self::REFRESHTOKEN]);
        }
    }

    /**
     * Returns the data stored on the given application key id.
     *
     * @param string $key
     *            Key of the Application::$data you want to get.
     * @return mixed
     */
    public function get(string $key) {
        return $this->data[$key] ?? null;
    }

    /**
     * Returns the application token (JWT) given by the LogiCommerce API.
     *
     * @return string|NULL
     */
    public function getToken(): ?string {
        return $this->get($this->tokenKey) ?? $this->tokenStorage::get($this->tokenKey);
    }

    protected function set(string $key, $value): void {
        $this->data[$key] = $value;
    }

    /**
     * Returns if the application has been initialized and has valid data.
     *
     * @return bool
     */
    public function hasInValidData(): bool {
        return is_null($this->getToken()) || strlen($this->getToken()) === 0;
    }

    /**
     * Refresh the application token.
     *
     * @return void
     */
    public function refreshToken(): void {
        $this->setAuth($this->getRefreshAuth());
    }

    /**
     * Sets the application token.
     *
     * @return void
     */
    public function setToken(): void {
        $this->setAuth($this->getAuth());
    }

    /**
     * Sets the application token.
     *
     * @return void
     */
    private function setApplicationToken(string $token): void {
        $this->tokenStorage::set($this->tokenKey, $token, (3600 * 24));
        $this->set($this->tokenKey, $token);
    }

    public abstract function getEcommerceSettings();

    protected abstract function getSettings();

    protected abstract function setSettings(): void;

    public abstract function getEcommercePlugins();

    // deprecated
    protected abstract function getPlugins(string $navigationHash);

    public abstract function setPlugins(string $navigationHash): void;

    public abstract function getEcommerceLicenses();

    protected abstract function getLicenses();

    protected abstract function setLicenses(): void;
}
