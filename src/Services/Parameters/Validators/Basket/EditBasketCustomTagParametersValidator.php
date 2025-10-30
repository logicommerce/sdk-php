<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Groups\CustomTagDataParametersGroup;
use SDK\Core\Services\Parameters\Validators\CustomTagDataParametersValidator;
use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;

/**
 * This is the basket custom tag parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class EditBasketCustomTagParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['customTagId'];

    protected function validateCustomTagId($customTagId): ?bool {
        return $this->validateId($customTagId);
    }

    protected function validateData($data): ?bool {
        if (is_array($data)) {
            (new CustomTagDataParametersValidator())->validate($data);
            return true;
        }
        return $this->validateItemsClass([$data], CustomTagDataParametersGroup::class);
    }
}
