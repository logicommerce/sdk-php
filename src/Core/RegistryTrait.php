<?php declare(strict_types=1);

namespace SDK\Core;

/**
 *
 * @see RegistryTrait::set()
 * @see RegistryTrait::get()
 * @see RegistryTrait::exist()
 *
 * @package SDK\Core
 */
trait RegistryTrait {

    /**
     *
     * @param string $key
     * @param mixed $value
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    public static function set(string $key, $value): void {
        if (!(isset(self::$storedValues[$key]) || array_key_exists($key, self::$storedValues))) {
            throw new \InvalidArgumentException('Error setting value in Registry. Invalid key given "' . $key . '"');
        }

        self::$storedValues[$key] = $value;
    }

    /**
     *
     * @param string $key
     *
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public static function get(string $key) {
        if (!self::exist($key)) {
            throw new \InvalidArgumentException('Error getting value from Registry. Invalid key given "' . $key . '"');
        }

        return self::$storedValues[$key];
    }

    /**
     *
     * @param string $key
     *
     * @return bool
     */
    public static function exist(string $key): bool {
        return isset(self::$storedValues[$key]);
    }
}
