<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the updateLockedStockTimer uId validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class UIdParametersValidator extends ParametersValidator {

    protected function validateUId($uId): ?bool {
        return $this->validateString($uId);
    }
}
