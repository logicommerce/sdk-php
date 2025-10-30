<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;

/**
 * This is the base add/edit product basket parameters validation trait.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
trait ProductParametersValidatorTrait {
    use IdentifiableItemsParametersValidatorTrait;

    protected function validateOptions($options): ?bool {
        if (!is_array($options)) {
            return null;
        }
        return true;
    }

    protected function validateQuantity($quantity): ?bool {
        return $this->validateNumeric($quantity);
    }

    protected function validateFromShoppingListRow($fromShoppingListRow): ?bool {
        return $this->validateId($fromShoppingListRow);
    }

    protected function validateProductType($productType): ?bool {
        return $this->validateEnumerateValue($productType, \SDK\Enums\ProductType::class);
    }

}
