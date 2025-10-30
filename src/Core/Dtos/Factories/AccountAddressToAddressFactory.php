<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Accounts\AccountAddress;
use SDK\Dtos\User\Address;
use SDK\Dtos\User\BillingAddress;
use SDK\Dtos\User\ShippingAddress;
use SDK\Enums\AccountAddressType;
use SDK\Enums\AddressType;
use SDK\Enums\CustomerType;
use SDK\Enums\UserType;

/**
 * Creates an address from the given data.
 *
 * @see AccountAddressToAddressFactory::create()
 * @see AccountAddressToAddressFactory::createAccountAddress()
 * @see AccountAddressToAddressFactory::getElement()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class AccountAddressToAddressFactory extends Factory {

    /**
     * Creates an address from the given data.
     *
     * @param array $data
     * @return Address|null
     */
    public static function create(array $data): ?Address {
        $type = $data['type'] ?? null;
        if (!$type) {
            return null;
        }
        if ($type === AccountAddressType::SHIPPING) {
            $type = AddressType::SHIPPING;
        } else {
            $type = AddressType::BILLING;
        }
        $data['type'] = $type;
        $data['defaultAddress'] = $data['defaultOne'] ?? false;
        $data['userType'] = UserType::tryFrom($data['customerType'] ?? CustomerType::EMPTY);
        unset($data['defaultOne']);
        if (isset($data['customerType'])) {
            unset($data['customerType']);
        }
        return self::createAddress($type, $data);
    }

    private static function createAddress(string $accountAddressType, array $data): ?Address {
        $address = new Address($data);
        match ($accountAddressType) {
            AddressType::BILLING => $address = new BillingAddress($data),
            AddressType::SHIPPING => $address = new ShippingAddress($data),
        };
        return $address;
    }

    public static function getElement(array $data = []): ?Address {
        return self::create($data);
    }
}
