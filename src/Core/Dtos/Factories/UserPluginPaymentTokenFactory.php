<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Common\UserPluginPaymentToken;

/**
 * This class will return the kind of page we need.
 *
 * @see Factory::getElement()
 * @see UserPluginPaymentTokenFactory::getPluginProperties()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class UserPluginPaymentTokenFactory extends Factory {

    public const TYPE = 'module';

    public const ADD_PARENT_TYPE = true;

    protected const NAMESPACE = 'Plugins';

    protected const DEFAULT_CLASS = 'SDK\Dtos\Common\UserPluginPaymentToken';

    protected const CLASS_SUFFIX = '\Dtos\Common\UserPluginPaymentToken';

    protected const CLASS_SEPARATOR = '.';

    /**
     * Returns the needed type of payment system.
     *
     * @return UserPluginPaymentToken|NULL
     */
    public static function getPluginPaymentToken(array $data = []): ?UserPluginPaymentToken {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?UserPluginPaymentToken {
        return self::getPluginPaymentToken($data);
    }
}
