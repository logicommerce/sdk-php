<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account\Addresses;

use SDK\Services\Parameters\Validators\Account\AccountShippingAddressParametersValidator;

/**
 * This is the account model (for shipping addresses resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account\Addresses
 */
class AccountShippingAddressParametersGroup extends AccountAddressParametersGroup {

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AccountShippingAddressParametersValidator {
        return new AccountShippingAddressParametersValidator();
    }
}
