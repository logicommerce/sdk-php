<?php

namespace SDK\Dtos\Accounts;

/**
 * This is the account address header extended main class.
 * The extended account address header information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see AccountAddressHeaderExtended::getPhone()
 * @see AccountAddressHeaderExtended::getMobile()
 * @see AccountAddressHeaderExtended::getAddress()
 *
 * @see AccountAddressHeader
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
