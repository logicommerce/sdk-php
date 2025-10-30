<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the user model (set user language resource) parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class SetLanguageParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = [ 'language' ];

    protected function validateLanguage($language): ?bool {
        return $this->validateString($language);
    }
}
