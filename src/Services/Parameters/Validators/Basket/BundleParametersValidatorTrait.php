<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;

/**
 * This is the base add/edit bundle basket parameters validation trait.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
trait BundleParametersValidatorTrait {
    use IdentifiableItemsParametersValidatorTrait;

    protected function validateItems($items): ?bool {
        if (!is_array($items) || empty($items)) {
            return null;
        }
        return true;
    }

    protected function validateQuantity($quantity): ?bool {
        return $this->validatePositiveNumeric($quantity);
    }

    protected function validateFromShoppingListRow($fromShoppingListRow): ?bool {
        return $this->validateId($fromShoppingListRow);
    }
}
