<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Session;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the session model (set Session currency resource) parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Session
 */
class SetCurrencyParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['currency'];

    protected function validateCurrency($currency): ?bool {
        return $this->validateString($currency);
    }
}
