<?php

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Enums\AddProductsMode;

/**
 * This is the basket add linked parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class AddLinkedParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, ProductParametersValidatorTrait;

    protected const REQUIRED_PARAMS = [ 'id', 'quantity', 'sectionId' ];

    protected function validateMode($mode): ?bool {
        return $this->validateEnumerateValue($mode, AddProductsMode::class);
    }

    protected function validateSectionId($sectionId): ?bool {
        return $this->validatePositiveNumeric($sectionId);
    }

    protected function validateParentHash($parentHash): ?bool {
        return $this->validateString($parentHash);
    }

}
