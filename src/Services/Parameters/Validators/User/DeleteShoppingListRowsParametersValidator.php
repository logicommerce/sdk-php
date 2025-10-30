<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;

/**
 * This is the delete shopping list row parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class DeleteShoppingListRowsParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected function validateProductIdList($productIdList): ?bool {
        if (is_null($this->validateArray($productIdList)) || (count($productIdList) > 0 && !$this->validateIdList(implode($productIdList)))) {
            return null;
        }
        return true;
    }

    protected function validateBundleIdList($bundleIdList): ?bool {
        if (is_null($this->validateArray($bundleIdList)) || (count($bundleIdList) > 0 && !$this->validateIdList(implode($bundleIdList)))) {
            return null;
        }
        return true;
    }

    protected function validateRowIdList($rowIdList): ?bool {
        if (is_null($this->validateArray($rowIdList)) || (count($rowIdList) > 0 && !$this->validateIdList(implode($rowIdList)))) {
            return null;
        }
        return true;
    }
}
