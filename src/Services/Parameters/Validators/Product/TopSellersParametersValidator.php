<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Product;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CatalogItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;

/**
 * This is the top sellers parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Product
 */
class TopSellersParametersValidator extends ParametersValidator {
    use CatalogItemsParametersValidatorTrait,
        IdentifiableItemsParametersValidatorTrait,
        PaginableItemsParametersValidatorTrait;

    protected function validateCategoryIdList($categoryIdList): ?bool {
        return $this->validateIdList($categoryIdList);
    }

    protected function validateBrandId($brandId): ?bool {
        return $this->validateId($brandId);
    }

    protected function validateProductsNumber($productsNumber): ?bool {
        return $this->validatePositiveNumeric($productsNumber);
    }
}
