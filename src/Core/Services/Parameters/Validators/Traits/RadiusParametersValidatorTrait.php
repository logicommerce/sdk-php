<?php

declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the radius validator trait.
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait RadiusParametersValidatorTrait {

    protected function validateRadius($radius): ?bool {
        if (is_numeric($radius) && $radius > 0) {
            return true;
        }
        return null;
    }
}
