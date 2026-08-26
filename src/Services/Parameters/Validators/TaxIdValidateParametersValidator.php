<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Enums\TaxIdOwnerType;
use SDK\Enums\TaxIdType;

/**
 * This is the taxId validation parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class TaxIdValidateParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['taxId', 'countryCode'];

    protected function validateTaxId($taxId): ?bool {
        return $this->validateString($taxId);
    }

    protected function validateCountryCode($countryCode): ?bool {
        return $this->validateString($countryCode);
    }

    protected function validateTaxIdType($taxIdType): ?bool {
        return $this->validateEnumerateValue($taxIdType, TaxIdType::class);
    }

    protected function validateTaxIdOwnerType($taxIdOwnerType): ?bool {
        return $this->validateEnumerateValue($taxIdOwnerType, TaxIdOwnerType::class);
    }
}
