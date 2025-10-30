<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Common\Codes;

/**
 * This is the Product Codes class.
 * The Codes information of API products will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductCodes::getManufacturerSku()
 *
 * @see Codes
 *
 * @package SDK\Dtos\Catalog\Product
 */
class ProductCodes extends Codes {
    use ElementTrait;

    protected string $manufacturerSku = '';

    /**
     * Returns the product manufacturer SKU.
     *
     * @return string
     */
    public function getManufacturerSku(): string {
        return $this->manufacturerSku;
    }
}
