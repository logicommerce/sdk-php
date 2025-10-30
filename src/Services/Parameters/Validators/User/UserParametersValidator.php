<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Enums\Gender;

/**
 * This is the base user parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
abstract class UserParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected function validateNick($nick): ?bool {
        return $this->validateString($nick, 0);
    }

    protected function validateGender($gender): ?bool {
        return $this->validateEnumerateValue($gender, Gender::class);
    }

    protected function validateBirthday($birthday): ?bool {
        return $this->validateDate($birthday);
    }

    protected function validateUseShippingAddress($useShippingAddress): ?bool {
        return $this->validateBoolean($useShippingAddress);
    }

    protected function validateImage($image): ?bool {
        return $this->validateString($image, 0);
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

    protected function validateGroupPId($groupPId): ?bool {
        if (is_string($groupPId)) {
            return true;
        }
        return null;
    }
}
