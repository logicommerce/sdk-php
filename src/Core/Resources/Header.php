<?php declare(strict_types=1);

namespace SDK\Core\Resources;

/**
 * This class will manage the headers that PHP will send to the response (not the received ones).
 *
 * @see Header::set()
 * @see Header::get()
 * @see Header::getAll()
 * @see Header::exist()
 * @see Header::unset()
 * @see Header::clear()
 *
 * @package SDK\Core\Resources
 */
abstract class Header {

    /**
     * Sets a header with the given key and value.
     *
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public static function set(string $key, ?string $value): void {
        if (!headers_sent() && !is_null($value)) {
            header($key . ': ' . $value);
        }
    }

    /**
     * Returns the value on the given header key.
     *
     * @param string $key
     *            Name of the header you want to get.
     *
     * @return string|NULL
     */
    public static function get(string $key): ?string {
        $headers = self::getAll();
        $headerValue = null;

        foreach ($headers as $header) {
            list($headerKey, $headerValue) = explode(':', $header, 2);
            if (trim($headerKey) === $key) {
                $headerValue = trim($headerValue);
                break;
            }
        }
        return $headerValue;
    }

    /**
     * Returns all the stored headers.
     *
     * @return array
     */
    public static function getAll(): array {
        if (headers_sent()) {
            return [];
        }
        return headers_list();
    }

    /**
     * Checks if the header identified by the given key exists.
     *
     * @param string $key
     *            Name of the header you want to check.
     *
     * @return bool
     */
    public static function exist(string $key): bool {
        return !is_null(self::get($key));
    }

    /**
     * Unsets the header with the given key.
     *
     * @param string $key
     *
     * @return void
     */
    public static function unset(string $key): void {
        if (!headers_sent()) {
            header_remove($key);
        }
    }

    /**
     * Unsets all the available headers.
     *
     * @return void
     */
    public static function clear(): void {
        if (!headers_sent()) {
            header_remove();
        }
    }
}
