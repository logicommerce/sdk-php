<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the add save for later list rows parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class AddSaveForLaterListRowParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['basketRowHash'];

    protected function validateBasketRowHash($basketRowHash): ?bool {
        return $this->validateString($basketRowHash);
    }
}
