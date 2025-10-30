<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\User\Address;

/**
 * This class will return the kind of address we need.
 *
 * @see Factory::getElement()
 * @see AddressFactory::getAddress()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class AddressFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\User';

    protected const DEFAULT_CLASS = self::NAMESPACE . '\BillingAddress';

    protected const CLASS_SUFFIX = 'Address';

    /**
     * Returns the needed type of address.
     *
     * @return Address|NULL
     */
    public static function getAddress(array $data = []): ?Address {
        return self::getItem($data);
    }

    public static function getElement(array $data = []): ?Address {
        return self::getAddress($data);
    }
}
