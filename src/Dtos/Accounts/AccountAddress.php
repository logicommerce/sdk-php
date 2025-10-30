<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\AccountAddressType;
use SDK\Enums\AddressType;

/**
 * AccountAddress class.
 * 
 * @see PurchaseAddress
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * 
 * @property bool $defaultOne
 * 
 * @package SDK\Dtos\Accounts
 */
abstract class AccountAddress extends PurchaseAddress {
    use IdentifiableElementTrait, IntegrableElementTrait, EnumResolverTrait;

    protected bool $defaultOne = false;

    protected string $type = '';


    /**
     * Returns the default one.
     *
     * @return bool
     */
    public function getDefaultOne(): bool {
        return $this->defaultOne;
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
