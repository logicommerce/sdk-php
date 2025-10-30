<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Geolocation;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\CountryCodeParametersValidatorTrait;

/**
 * This is the Location parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Geolocation
 */
class LocationParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, CountryCodeParametersValidatorTrait;

    protected const REQUIRED_PARAMS = [ 'countryCode' ];

    protected function validateParentId($parentId): ?bool {
        return $this->validateId($parentId);
    }

    protected function validateLanguageCode($languageCode): ?bool {
        return $this->validateString($languageCode);
    }

}
