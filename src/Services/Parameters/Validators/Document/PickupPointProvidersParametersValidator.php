<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Document;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CountryCodeParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;

/**
 * This is the pickup point providers parameters validation class.
 *
 * @uses: SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait
 * @package SDK\Services\Parameters\Validators\Document
 */
class PickupPointProvidersParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, PaginableItemsParametersValidatorTrait, CountryCodeParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['countryCode'];
}
