<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Dtos\BaseAddressData;

/**
 * This is the user Address Validate class.
 * The addresses information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ElementTrait
 * @see BaseAddressData
 *
 * @package SDK\Dtos\User
 */
class AddressValidate extends BaseAddressData {
    use ElementTrait;
}
