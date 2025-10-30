<?php

declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the city validator trait.
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait CityParametersValidatorTrait {

    protected function validateCity($city): ?bool {
        return $this->validateId($city);
    }
}
