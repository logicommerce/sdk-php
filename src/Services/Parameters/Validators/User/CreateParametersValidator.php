<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Services\Parameters\Validators\Traits\EmailParametersValidatorTrait;
use SDK\Services\Parameters\Groups\User\Addresses\BillingAddressParametersGroup;
use SDK\Services\Parameters\Groups\User\Addresses\ShippingAddressParametersGroup;

/**
 * This is the create user parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class CreateParametersValidator extends UserParametersValidator {
    use IdentifiableElementTrait, EmailParametersValidatorTrait;

    protected function validatePassword($password): ?bool {
        return $this->validateString($password,0);
    }

    protected function validateCreateAccount($createAccount): ?bool {
        return $this->validateBoolean($createAccount);
    }

    protected function validateBillingAddress($billingAddress): ?bool {
        if (is_array($billingAddress)) {
            (new BillingAddressParametersValidator())->validate($billingAddress);
            return true;
        }
        return $this->validateItemsClass([$billingAddress], BillingAddressParametersGroup::class);
    }

    protected function validateShippingAddress($shippingAddress): ?bool {
        if (is_array($shippingAddress)) {
            (new ShippingAddressParametersValidator())->validate($shippingAddress);
            return true;
        }
        return $this->validateItemsClass([$shippingAddress], ShippingAddressParametersGroup::class);
    }
}
