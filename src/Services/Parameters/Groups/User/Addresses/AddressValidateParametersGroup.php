<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User\Addresses;

use SDK\Services\Parameters\Groups\BaseUserDataParametersGroup;
use SDK\Services\Parameters\Validators\User\AddressValidateParametersValidator;

/**
 * This is the user model (base for addresses resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User\Addresses
 */
class AddressValidateParametersGroup extends BaseUserDataParametersGroup {

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AddressValidateParametersValidator {
        return new AddressValidateParametersValidator();
    }
}
