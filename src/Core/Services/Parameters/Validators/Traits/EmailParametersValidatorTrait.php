<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the email parameters validation trait.
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait EmailParametersValidatorTrait {

    protected function validateEmail($email): ?bool {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return null;
        }

        return true;
    }
}
