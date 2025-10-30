<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Groups\CustomTagDataParametersGroup;
use SDK\Core\Services\Parameters\Validators\CustomTagDataParametersValidator;
use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the unsubscribe to the newsletter parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class UserCustomTagParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['customTagId'];

    protected function validateCustomTagId($customTagId): ?bool {
        return $this->validatePositiveNumeric($customTagId);
    }

    protected function validateData($data): ?bool {
        if (is_array($data)) {
            (new CustomTagDataParametersValidator())->validate($data);
            return true;
        }
        return $this->validateItemsClass([$data], CustomTagDataParametersGroup::class);
    }
}
