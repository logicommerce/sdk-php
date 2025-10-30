<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the rate parameters validation trait.
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait RateParametersValidatorTrait {

    protected function validateRating($rating): ?bool {
        if ($rating !== 0 & (is_null($this->validatePositiveNumeric($rating)) || $rating > 5)) {
            return null;
        }

        return true;
    }
}
