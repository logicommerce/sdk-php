<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CityParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\CountryCodeParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\LocationIdParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\CoordinateParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PhysicalLocationParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PostalCodeParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\RadiusParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\StateParametersValidatorTrait;

/**
 * This is the basket deliveries validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class DeliveriesParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait,
        CountryCodeParametersValidatorTrait,
        LocationIdParametersValidatorTrait,
        CoordinateParametersValidatorTrait,
        PaginableItemsParametersValidatorTrait,
        PhysicalLocationParametersValidatorTrait,
        PostalCodeParametersValidatorTrait,
        StateParametersValidatorTrait,
        CityParametersValidatorTrait,
        RadiusParametersValidatorTrait;

    protected function validatePostalCode($postalCode): ?bool {
        return $this->validateString($postalCode, 0);
    }
}
