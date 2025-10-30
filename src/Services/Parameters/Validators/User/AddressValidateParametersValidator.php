<?php

namespace SDK\Services\Parameters\Validators\User;

/**
 * This is the Address Validate parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class AddressValidateParametersValidator extends AddressParametersValidator {

    protected const REQUIRED_VINCULATED_PARAMS = ['address' => 'location', 'location' => 'address'];
}
