<?php declare(strict_types=1);

namespace SDK\Core\Services;

use SDK\Core\Registry;

/**
 * This is the main model trait.
 *
 * @see ServiceTrait::getInstance()
 *
 * @package SDK\Core\Services
 */
trait ServiceTrait {

    /**
     * Returns the requested model instance.
     * If is not setted, this method will set it.
     *
     * @return Service
     */
    public static function getInstance(): Service {
        if (!Registry::exist(self::REGISTRY_KEY)) {
            Registry::set(self::REGISTRY_KEY, new self());
        }

        return Registry::get(self::REGISTRY_KEY);
    }
}
