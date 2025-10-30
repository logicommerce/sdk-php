<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\User\Address;
use SDK\Dtos\User\BillingAddress;
use SDK\Enums\AddressType;
use SDK\Enums\CustomerType;
use SDK\Enums\UserType;

/**
 * This is the factory class for creating billing addresses from account invoicing addresses.
 *
 * @see AccountInvoicingAddressToBillingAddressFactory::create()
 * @see AccountInvoicingAddressToBillingAddressFactory::getElement()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class AccountInvoicingAddressToBillingAddressFactory extends Factory {

    /**
     * Returns the needed type of address.
     * 
     * @param array $data
     * @return Address|null
     */
    public static function create(array $data): ?BillingAddress {
        if (isset($data["error"])) {
            return new BillingAddress($data);
        }
        $data['type'] = AddressType::BILLING;
        $data['defaultAddress'] = $data['defaultOne'] ?? false;
        $data['userType'] = UserType::tryFrom($data['customerType'] ?? CustomerType::EMPTY);
        unset($data['defaultOne']);
        unset($data['customerType']);

        return new BillingAddress($data);
    }

    public static function getElement(array $data = []): ?BillingAddress {
        return self::create($data);
    }
}
