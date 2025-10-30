<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\EmailParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Services\Parameters\Groups\Account\Addresses\AccountInvoicingAddressParametersGroup;
use SDK\Services\Parameters\Groups\Account\CompanyDivisionMasterParametersGroup;

/**
 * This is the add company divisions parameters validation class.
 * 
 * @package SDK\Services\Parameters\Validators\Account
 */
class CompanyDivisionsParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, EmailParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['master'];

    protected function validateMaster($master): ?bool {
        if (is_array($master)) {
            (new CompanyDivisionMasterParametersValidator())->validate($master);
            return true;
        }
        return $this->validateItemsClass([$master], CompanyDivisionMasterParametersGroup::class);
    }

    protected function validateInvoicingAddress($invoicingAddress): ?bool {
        if (is_array($invoicingAddress)) {
            (new AccountInvoicingAddressParametersValidator())->validate($invoicingAddress);
            return true;
        }
        return $this->validateItemsClass([$invoicingAddress], AccountInvoicingAddressParametersGroup::class);
    }

    protected function validateShippingAddress($shippingAddress): ?bool {
        if (is_array($shippingAddress)) {
            (new AccountShippingAddressParametersValidator())->validate($shippingAddress);
            return true;
        }
        return $this->validateItemsClass([$shippingAddress], AccountShippingAddressParametersValidator::class);
    }

    protected function validateCustomTags($customTags): ?bool {
        if (!is_array($customTags)) {
            return null;
        }
        foreach ($customTags as $customTag) {
            if (
                !isset($customTag['customTagId']) ||
                is_null($this->validateId($customTag['customTagId']))
            ) {
                return null;
            }
            if (
                (!isset($customTag['value']) || !is_string($customTag['value'])) &&
                (!isset($customTag['data']) || is_null($customTag['data']))
            ) {
                return null;
            }
        }
        return true;
    }

    protected function validateImage($image): ?bool {
        return $this->validateString($image, 0);
    }

    protected function validateGroupPId($groupPId): ?bool {
        return $this->validatePId($groupPId);
    }

    protected function validatePostLogin($postLogin): ?bool {
        return $this->validateBoolean($postLogin);
    }

    protected function validateDescription($description): ?bool {
        return $this->validateString($description, 0);
    }
}
