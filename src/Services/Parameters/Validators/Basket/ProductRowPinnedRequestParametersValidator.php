<?php

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Services\Parameters\Groups\Basket\ProductRowPinnedPriceRequestParametersGroup;
use SDK\Services\Parameters\Groups\Basket\ProductRowPinnedRequestImageParametersGroup;
use SDK\Services\Parameters\Validators\Basket\ProductRowPinnedRequestImageParametersValidator;

/**
 * This is the basket Product Row Pinned Request parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class ProductRowPinnedRequestParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = [];

    protected function validatePrice($price): ?bool {
        if ($price instanceof ProductRowPinnedPriceRequestParametersGroup) {
            $price = $price->toArray();
        }
        (new ProductRowPinnedPriceRequestParametersValidator())->validate($price);
        return true;
    }

    protected function validateImage($image): ?bool {
        if ($image instanceof ProductRowPinnedRequestImageParametersGroup) {
            $image = $image->toArray();
        }
        (new ProductRowPinnedRequestImageParametersValidator())->validate($image);
        return true;
    }
}
