<?php declare(strict_types=1);

namespace SDK\Core\Resources;

/**
 * This class will allow us to get environment variables setted on the OS.
 *
 * @see Environment::getAll()
 * @see Environment::get()
 * @see Environment::set()
 *
 * @package SDK\Core\Resources
 */
abstract class Environment {

    private const COMMERCE_MODE = 'COMMERCE_MODE';

    private const DEVEL = 'DEVEL';

    /**
     * Returns all the data stored as OS environment variables.
     *
     * @return array
     */
    public static function getAll(): array {
        $envVars = getenv();
        if (array_key_exists('DEVEL', $envVars)) {
            $envVars['DEVEL'] = $envVars['DEVEL'] == 'true';
        }
        if (self::getCommerceMode() === self::DEVEL) {
            $envVars += get_defined_constants(true)['user'];
        }
        return $envVars;
    }

    /**
     * Returns the data stored on the given environment key.
     *
     * @param string $key
     *            Name of the environment key you want to get.
     *
     * @return mixed|NULL
     */
    public static function get(string $key) {
        return self::getConstantValue($key) ?: (self::getEnvVar($key) ?: ($key === self::COMMERCE_MODE ? self::getCommerceMode() : null));
    }

    private static function getConstantValue(string $key) {
        if (self::getCommerceMode() === self::DEVEL) {
            return (defined($key)) ? constant($key) : null;
        }
        return null;
    }

    private static function getCommerceMode(): string {
        return getenv(self::COMMERCE_MODE) ?: self::DEVEL;
    }
    
    /**
     * Sets a environment key with the given value.
     *
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public static function set(string $key, string $value): void {
        putenv($key . '=' . $value);
    }

    private static function getEnvVar(string $key) {
        $envVars = self::getAll();
        if (array_key_exists($key, $envVars)) {
           return $envVars[$key];
        }
        return getenv($key);
    }
}
