<?php

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CityParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\CountryCodeParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\LocationIdParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\CoordinateParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PhysicalLocationParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PostalCodeParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\RadiusParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\StateParametersValidatorTrait;

/**
 * This is the physical location parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class PhysicalLocationParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait,
        CountryCodeParametersValidatorTrait,
        LocationIdParametersValidatorTrait,
        PaginableItemsParametersValidatorTrait,
        CoordinateParametersValidatorTrait,
        PhysicalLocationParametersValidatorTrait,
        PostalCodeParametersValidatorTrait,
        StateParametersValidatorTrait,
        CityParametersValidatorTrait,
        RadiusParametersValidatorTrait;

    protected function validateLanguageCode($languageCode): ?bool {
        return $this->validateString($languageCode);
    }

    protected function validateParentIdList($parentIdList): ?bool {
        return $this->validateIdList($parentIdList);
    }
}
