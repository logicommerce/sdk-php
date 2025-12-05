<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Product;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Product\ProductRewardPointsParametersValidator;

/**
 * This is the product reward points parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Product
 */
class ProductRewardPointsParametersGroup extends ParametersGroup {

    protected int $quantity;

    /**
     * Sets a the quantity.
     *
     * @param int $quantity
     *
     * @return void
     */
    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): ProductRewardPointsParametersValidator {
        return new ProductRewardPointsParametersValidator();
    }
}
