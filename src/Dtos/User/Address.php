<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Dtos\BaseAddressData;

/**
 * This is the user address class.
 * The addresses information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Address::getDefaultAddress()
 *
 * @see ElementTrait
 * @see BaseAddressData
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\User
 */
class Address extends BaseAddressData {
    use ElementTrait, IntegrableElementTrait;

    protected bool $defaultAddress = false;

    /**
     * Sets if this address is the default one or not.
     *
     * @return bool
     */
    public function getDefaultAddress(): bool {
        return $this->defaultAddress;
    }
}
