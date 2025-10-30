<?php

namespace SDK\Services\Parameters\Validators\Account;

/**
 * This is the invoicing address parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class AccountInvoicingAddressParametersValidator extends AccountAddressParametersValidator {

    protected function validateRe($re): ?bool {
        return $this->validateBoolean($re);
    }

    protected function validateTax($tax): ?bool {
        return $this->validateBoolean($tax);
    }
}
