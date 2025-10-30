<?php

declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the Location id validator trait.
 * Needs IdentifiableItemsParametersValidatorTrait to work
 * @see IdentifiableItemsParametersValidatorTrait
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait LocationIdParametersValidatorTrait {

    protected function validateLocationId($locationId): ?bool {
        return $this->validateId($locationId);
    }
}
