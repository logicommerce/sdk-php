<?php

declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the state validator trait.
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait StateParametersValidatorTrait {

    protected function validateState($state): ?bool {
        return $this->validateId($state);
    }
}
