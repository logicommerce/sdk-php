<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the add save for later list rows parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class AddSaveForLaterListRowsParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['items'];

    protected function validateItems($items): ?bool {
        if (is_null($this->validateArray($items)) || count($items) === 0) {
            return null;
        }
        return true;
    }
}
