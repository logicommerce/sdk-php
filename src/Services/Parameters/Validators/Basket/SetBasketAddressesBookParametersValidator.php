<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the basket addresses validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class SetBasketAddressesBookParametersValidator extends ParametersValidator {

    protected function validateBillingAddressId($billingAddressId): ?bool {
        return $this->validatePositiveNumeric($billingAddressId);
    }

    protected function validateShippingAddressId($shippingAddressId): ?bool {
        if ($this->validateNumeric($shippingAddressId) && $shippingAddressId >= 0) {
            return true;
        }
        return null;
    }

    protected function validateUseShippingAddress($useShippingAddress): ?bool {
        return $this->validateBoolean($useShippingAddress);
    }

}
