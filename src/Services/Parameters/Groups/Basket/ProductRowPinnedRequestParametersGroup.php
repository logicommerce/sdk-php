<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\ProductRowPinnedRequestParametersValidator;

/**
 * This is the basket model (pinProductAttributes resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class ProductRowPinnedRequestParametersGroup extends ParametersGroup {

    protected ?ProductRowPinnedPriceRequestParametersGroup $price;

    protected ?ProductRowPinnedRequestImageParametersGroup $image = null;

    /**
     * Sets the price of the indicated product row
     *
     * @param ProductRowPinnedPriceRequestParametersGroup $price
     *
     * @return void
     */
    public function setPrice(ProductRowPinnedPriceRequestParametersGroup $price): void {
        $this->price = $price;
    }

    /**
     * Sets the image of the indicated product row
     *
     * @param ProductRowPinnedRequestImageParametersGroup $image
     *
     * @return void
     */
    public function setImage(ProductRowPinnedRequestImageParametersGroup $image): void {
        $this->image = $image;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): ProductRowPinnedRequestParametersValidator {
        return new ProductRowPinnedRequestParametersValidator();
    }
}
