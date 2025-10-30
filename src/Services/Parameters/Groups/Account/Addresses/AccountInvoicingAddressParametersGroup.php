<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account\Addresses;

use SDK\Services\Parameters\Validators\Account\AccountInvoicingAddressParametersValidator;

/**
 * This is the account model (for invoicing addresses resources) parameters group class.
 * 
 * @package SDK\Services\Parameters\Groups\Account\Addresses
 */
class AccountInvoicingAddressParametersGroup extends AccountAddressParametersGroup {

    protected bool $re;

    protected bool $tax;

    /**
     * Sets if the account is liable to sales equalization tax.
     *
     * @param bool $re
     *
     * @return void
     */
    public function setRe(bool $re): void {
        $this->re = $re;
    }

    /**
     * Sets if the account is liable to sales equalization tax.
     *
     * @param bool $tax
     *
     * @return void
     */
    public function setTax(bool $tax): void {
        $this->tax = $tax;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AccountInvoicingAddressParametersValidator {
        return new AccountInvoicingAddressParametersValidator();
    }
}
