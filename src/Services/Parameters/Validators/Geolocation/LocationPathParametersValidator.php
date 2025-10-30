<?php

namespace SDK\Services\Parameters\Validators\Geolocation;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\CountryCodeParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\LocationIdParametersValidatorTrait;

/**
 * This is the Location path parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Geolocation
 */
class LocationPathParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, CountryCodeParametersValidatorTrait, LocationIdParametersValidatorTrait;

    protected const REQUIRED_PARAMS = [ 'countryCode', 'locationId' ];
}
