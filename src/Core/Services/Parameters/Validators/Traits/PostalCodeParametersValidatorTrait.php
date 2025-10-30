<?php

declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the postalCode validator trait.
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait PostalCodeParametersValidatorTrait {

    protected function validatePostalCode($postalCode): ?bool {
        return $this->validateId($postalCode);
    }
}
