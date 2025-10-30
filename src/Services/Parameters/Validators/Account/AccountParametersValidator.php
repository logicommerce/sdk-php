<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\EmailParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;

/**
 * This is the create account parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
abstract class AccountParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, EmailParametersValidatorTrait;

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

    protected function validateImage($image): ?bool {
        return $this->validateString($image, 0);
    }
}
