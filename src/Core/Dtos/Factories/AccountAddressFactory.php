<?php

namespace SDK\Core\Dtos\Factories;

use FWK\Core\Theme\Dtos\Account;
use SDK\Core\Dtos\Factory;
use SDK\Dtos\Accounts\AccountAddress;
use SDK\Dtos\Accounts\AccountInvoicingAddress;
use SDK\Dtos\Accounts\AccountShippingAddress;
use SDK\Enums\AccountAddressType;
use SDK\Enums\AddressType;

/**
 * Factory for account addresses.
 *
 * @see AccountAddressFactory::create()
 * @see AccountAddressFactory::createAccountAddress()
 * @see AccountAddressFactory::getElement()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class AccountAddressFactory extends Factory {

    /**
     * Returns the needed type of address.
     * 
     * @param array $data
     * @return AccountAddress|null
     */
    public static function create(array $data): ?AccountAddress {
        $type = $data['type'] ?? null;
        if (!$type) {
            return null;
        }
        if ($type === AddressType::BILLING) {
            $type = AccountAddressType::INVOICING;
        }
        $accountAddressType = AccountAddressType::tryFrom($type);
        return $accountAddressType ? self::createAccountAddress($type, $data) : new AccountAddress($data);
    }

    private static function createAccountAddress(string $accountAddressType, array $data): AccountAddress {
        match ($accountAddressType) {
            AccountAddressType::INVOICING => $accountAddress = new AccountInvoicingAddress($data),
            AccountAddressType::SHIPPING => $accountAddress = new AccountShippingAddress($data),
            default => $accountAddress = new AccountAddress($data),
        };
        return $accountAddress;
    }

    public static function getElement(array $data = []): ?AccountAddress {
        return self::create($data);
    }
}
