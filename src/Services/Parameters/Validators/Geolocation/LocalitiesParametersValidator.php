<?php

namespace SDK\Services\Parameters\Validators\Geolocation;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\CountryCodeParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\QParametersValidatorTrait;

/**
 * This is the get localities parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Geolocation
 */
class LocalitiesParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, CountryCodeParametersValidatorTrait, QParametersValidatorTrait;

    protected const REQUIRED_PARAMS = [ 'countryCode', 'q' ];
}
