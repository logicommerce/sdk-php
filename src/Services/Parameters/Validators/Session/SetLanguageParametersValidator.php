<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Session;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the session model (set Session language resource) parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Session
 */
class SetLanguageParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['language'];

    protected function validateLanguage($language): ?bool {
        return $this->validateString($language);
    }
}
