<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\CustomerType;

/**
 * This is the account address header main class.
 * The account address header information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AccountAddressHeaderExtended::getCustomerType()
 *
 * @see AccountAddressHeader
 * @uses EnumResolverTrait
 *
 * @package SDK\Dtos\Accounts
 */
class AccountAddressHeaderExtended extends AccountAddressHeader {

    protected string $phone = '';

    protected string $mobile = '';

    protected string $address = '';

    /**
     * Returns the address phone.
     *
     * @return string
     */
    public function getPhone(): string {
        return $this->phone;
    }

    /**
     * Returns the address mobile.
     *
     * @return string
     */
    public function getMobile(): string {
        return $this->mobile;
    }

    /**
     * Returns the address address (street and other filled data in this field).
     *
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
    }
}
