<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\EmailParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Enums\Gender;

/**
 * This is the account model (registered users resource) parameters validator class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class RegisteredUserApproveUpdateParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, EmailParametersValidatorTrait;

    protected function validateUsername($username): ?bool {
        return $this->validateString($username, 0);
    }

    protected function validatePassword($password): ?bool {
        return $this->validateString($password);
    }

    protected function validateFirstName($firstName): ?bool {
        return $this->validateString($firstName, 0);
    }

    protected function validateLastName($lastName): ?bool {
        return $this->validateString($lastName, 0);
    }

    protected function validateBirthday($birthday): ?bool {
        return $this->validateDate($birthday);
    }

    protected function validateImage($image): ?bool {
        return $this->validateString($image, 0);
    }

    protected function validateGender($gender): ?bool {
        return $this->validateEnumerateValue($gender, Gender::class);
    }

    protected function validateCustomTags($customTags): ?bool {
        if (!is_array($customTags)) {
            return null;
        }
        foreach ($customTags as $customTag) {
            if (
                !isset($customTag['customTagId']) ||
                is_null($this->validateId($customTag['customTagId']))
            ) {
                return null;
            }
            if (
                (!isset($customTag['value']) || !is_string($customTag['value'])) &&
                (!isset($customTag['data']) || is_null($customTag['data']))
            ) {
                return null;
            }
        }
        return true;
    }
}
