<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User\Addresses;

use SDK\Services\Parameters\Validators\User\ShippingAddressParametersValidator;


/**
 * This is the user model (for shipping addresses resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User\Addresses
 */
class ShippingAddressParametersGroup extends AddressParametersGroup {

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): ShippingAddressParametersValidator {
        return new ShippingAddressParametersValidator();
    }
}
