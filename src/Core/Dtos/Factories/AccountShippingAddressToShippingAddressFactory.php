<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\User\ShippingAddress;
use SDK\Enums\AddressType;
use SDK\Enums\CustomerType;
use SDK\Enums\UserType;

/**
 * This is the factory class for creating shipping addresses from account shipping addresses.
 *
 * @see AccountShippingAddressToShippingAddressFactory::create()
 * @see AccountShippingAddressToShippingAddressFactory::getElement()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class AccountShippingAddressToShippingAddressFactory extends Factory {

    /**
     * Creates a new shipping address from the given data.
     *
     * @param array $data
     * @return ShippingAddress|null
     */
    public static function create(array $data): ?ShippingAddress {
        if (isset($data["error"])) {
            return new ShippingAddress($data);
        }
        $data['type'] = AddressType::SHIPPING;

        $data['defaultAddress'] = $data['defaultOne'] ?? false;
        $data['userType'] = UserType::EMPTY;
        unset($data['defaultOne']);

        return new ShippingAddress($data);
    }

    public static function getElement(array $data = []): ?ShippingAddress {
        return self::create($data);
    }
}
