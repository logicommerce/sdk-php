<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the unsubscribe to the newsletter parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class VerifyParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = [ 'uniqueId' ];

    protected function validateUniqueId($uniqueId): ?bool {
        return $this->validateString($uniqueId);
    }
}
