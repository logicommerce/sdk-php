<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Enums\ProductType;

/**
 * This is the basket model (edit product resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class EditVoucherPurchaseParametersGroup extends EditProductParametersGroup {

    protected string $productType = ProductType::VOUCHER_PURCHASE;

        /**
     * Sets the product type for this parameters group.
     *
     * @param string $productType
     *
     * @return void
     */
    public function setProductType(string $productType): void {
        $this->productType = $productType;
    }    
    
}
