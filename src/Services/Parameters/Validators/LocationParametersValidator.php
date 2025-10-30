<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\CountryCodeParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\LocationIdParametersValidatorTrait;
use SDK\Services\Parameters\Groups\CoordinateParametersGroup;

/**
 * This is the location parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class LocationParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, CountryCodeParametersValidatorTrait, LocationIdParametersValidatorTrait;

    protected function validateCoordinate($coordinate): ?bool {
        if ($coordinate instanceof CoordinateParametersGroup) {
            $coordinate = $coordinate->toArray();
        }

        (new CoordinateParametersValidator())->validate($coordinate);

        return true;
    }
}
