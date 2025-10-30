<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CoordinateParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\RadiusParametersValidatorTrait;

/**
 * This is the ProviderPickupPointPickingDeliveries validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class ProviderPickupPointPickingDeliveriesParametersValidator extends ParametersValidator {
    use CoordinateParametersValidatorTrait, RadiusParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['pickupPointProviderId', 'countryCode'];

    protected function validatePickupPointProviderId($pickupPointProviderId): ?bool {
        return $this->validatePositiveNumeric($pickupPointProviderId);
    }

    protected function validateCountryCode($countryCode): ?bool {
        return $this->validateString($countryCode);
    }

    protected function validatePostalCode($postalCode): ?bool {
        return $this->validateString($postalCode);
    }

    protected function validateCity($city): ?bool {
        return $this->validateString($city);
    }
}
