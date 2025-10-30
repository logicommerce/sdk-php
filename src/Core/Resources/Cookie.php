<?php

declare(strict_types=1);

namespace SDK\Core\Resources;

/**
 * This is the Cookie management class.
 * Cookies will be managed on that class.
 *
 * @see Cookie::set()
 * @see Cookie::get()
 * @see Cookie::getAll()
 * @see Cookie::exist()
 * @see Cookie::unset()
 * @see Cookie::clear()
 * @see Cookie::send()
 *
 * @package SDK\Core\Resources
 */
abstract class Cookie {

    /**
     * Variable that will contains all the setted cookies on the current request
     *
     * @var array
     */
    private static array $requestCookies = [];

    /**
     * Storage the cookies actions in order to execute them when requested with the method "send".
     *
     * @var array
     */
    private static array $cookiesActions = [];

    private const VALUE = 'value';

    private const ACTION = 'action';

    private const SET = 'set';

    private const UNSET = 'unset';

    /**
     * Adds a COOKIE with the given key and value.
     * The Cookie will be setted on the user's browser only by calling the "send" method.
     *
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public static function set(string $key, string $value): void {
        self::$requestCookies[$key] = $value;
        self::$cookiesActions[$key] = [
            self::VALUE => $value,
            self::ACTION => self::SET
        ];
    }

    /**
     * Returns the data stored on the given COOKIE key.
     *
     * @param string $key
     *            Name of the COOKIE you want to get.
     *
     * @return string|NULL
     */
    public static function get(string $key): ?string {
        return self::getAll()[$key] ?? null;
    }

    /**
     * Returns all the stored cookies.
     *
     * @return array
     */
    public static function getAll(): array {
        return self::$requestCookies + $_COOKIE;
    }

    /**
     * Checks if the COOKIE identified by the given key exists.
     *
     * @param string $key
     *            Name of the COOKIE you want to check.
     *
     * @return bool
     */
    public static function exist(string $key): bool {
        return !is_null(self::get($key));
    }

    /**
     * Unsets the COOKIE with the given key.
     * The Cookie will be unsetted on the user's browser only by calling the "send" method.
     *
     * @param string $key
     *
     * @return void
     */
    public static function unset(string $key): void {
        self::$cookiesActions[$key] = [
            self::VALUE => null,
            self::ACTION => self::UNSET
        ];
        unset(self::$requestCookies[$key]);
        unset($_COOKIE[$key]);
    }

    /**
     * Unsets all the available COOKIEs.
     *
     * @return void
     */
    public static function clear(): void {
        foreach (array_keys(self::getAll()) as $cookie) {
            self::unset($cookie);
        }
    }

    /**
     * Encapsulate the native setcookie function with the fixed parameters that won't change during the application usage.
     *
     * @return void
     */
    private static function setcookie(string $key, string $value, int $expires): void {
        $httpOnly = true;
        if ($key == "folcsVersion") {
            $httpOnly = false;
        }
        setcookie($key, $value, [
            'expires' => $expires,
            'path' => '/',
            'domain' => Connection::getHost(),
            'secure' => Connection::isHttps(),
            'httponly' => $httpOnly,
            'samesite' => 'None',
        ]);
    }

    /**
     * Send the setted cookies on this class to set and unset them from user's browser.
     *
     * @return void
     */
    public static function send(): void {
        if (!headers_sent()) {
            foreach (self::$cookiesActions as $cookieKey => $cookieContent) {
                if ($cookieContent[self::ACTION] === self::UNSET) {
                    self::setcookie($cookieKey, '', time() - 24 * 3600);
                } else {
                    self::setcookie($cookieKey, $cookieContent[self::VALUE], time() + COOKIE_LIFETIME);
                }
            }
        }
    }


    public static function getDefinition(string $key): ?string {
        return self::getCookieDefinition($key, self::getAll()[$key]);
    }

    public static function getCookieDefinition(string $key, ?string $value): ?string {
        if (is_null($value)) {
            return null;
        }

        $cookieString = $key . '=' . urlencode($value);
        $cookieString .= '; Expires=' . gmdate('D, d-M-Y H:i:s T', time() + COOKIE_LIFETIME);
        $cookieString .= '; Path=/';
        $cookieString .= '; Domain=' . Connection::getHost();

        if (Connection::isHttps()) {
            $cookieString .= '; Secure';
        }
        $httpOnly = true;
        if ($key == "folcsVersion") {
            $httpOnly = false;
        }
        if ($httpOnly) {
            $cookieString .= '; HttpOnly';
        }

        $cookieString .= '; SameSite=None';

        return $cookieString;
    }
}
