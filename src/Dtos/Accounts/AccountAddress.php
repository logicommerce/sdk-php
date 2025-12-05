<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\AccountAddressType;
use SDK\Enums\AddressType;

/**
 * This is the base account address main abstract class.
 * The account address information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see AccountAddress::getDefaultOne()
 * @see AccountAddress::getDefaultAddress()
 * @see AccountAddress::getType()
 *
 * @see PurchaseAddress
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see EnumResolverTrait
 * @see AccountAddressType
 * @see AddressType
 *
 * @package SDK\Dtos\Accounts
 */
abstract class AccountAddress extends PurchaseAddress {
    use IdentifiableElementTrait, IntegrableElementTrait, EnumResolverTrait;

    protected bool $defaultOne = false;

    protected bool $defaultAddress = false;

    protected string $type = '';


    /**
     * Returns the default one.
     *
     * @return bool
     */
    public function getDefaultOne(): bool {
        return $this->defaultOne;
    }
    public function setDefaultOne(bool $defaultOne): void {
        $this->defaultOne = $defaultOne;
        $this->defaultAddress = $defaultOne;
    }
    /**
     * Returns the default address.
     *
     * @return bool
     */
    public function getDefaultAddress(): bool {
        return $this->defaultAddress;
    }

    /**
     * Returns the address type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(AccountAddressType::class, $this->type, AccountAddressType::INVOICING);
    }

    protected function setType(string $type): void {
        if ($type === AddressType::BILLING) {
            $this->type = AccountAddressType::INVOICING;
        } else {
            $this->type = $type;
        }
    }
}
