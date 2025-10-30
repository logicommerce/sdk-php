<?php declare(strict_types=1);

namespace SDK\Core\Resources;

/**
 * This is the Server management class.
 * Server variables will be managed on that class.
 *
 * @see Server::get()
 * @see Server::getAll()
 * @see Server::exist()
 * @package SDK\Core\Resources
 */
abstract class Server {

    /**
     * Returns the data stored on the given SERVER key.
     *
     * @param string $key
     *            Name of the SERVER you want to get.
     *
     * @return string|NULL
     */
    public static function get(string $key): ?string {
        return $_SERVER[$key] ?? null;
    }

    /**
     * Returns all the stored SERVER variables.
     *
     * @return array
     */
    public static function getAll(): array {
        return $_SERVER;
    }

    /**
     * Checks if the SERVER variable identified by the given key exists.
     *
     * @param string $key
     *            Name of the SERVER key you want to check.
     *
     * @return bool
     */
    public static function exist(string $key): bool {
        return isset($_SERVER[$key]) && !is_null($_SERVER[$key]);
    }
}
