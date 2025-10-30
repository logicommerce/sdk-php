<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Product;

use SDK\Core\Exceptions\InvalidParameterException;
use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CatalogItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\FilterIndexableParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\QParametersValidatorTrait;
use SDK\Enums\OptionsPriceMode;
use SDK\Enums\CustomTagsSearchType;
use SDK\Enums\ProductOptionsPriceSort;
use SDK\Enums\ProductSearchDeep;
use SDK\Enums\ProductSearchType;
use SDK\Enums\ProductSort;
use SDK\Enums\StockType;

/**
 * This is the products parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Product
 */
#[\AllowDynamicProperties]
class ProductsParametersValidator extends ParametersValidator {
    use CatalogItemsParametersValidatorTrait,
        IdentifiableItemsParametersValidatorTrait,
        PaginableItemsParametersValidatorTrait,
        QParametersValidatorTrait,
        FilterIndexableParametersValidatorTrait;

    /**
     */
    protected function methodExists(string $method): bool {
        return method_exists($this, $method) || property_exists($this, $method);
    }

    /**
     * @throws InvalidParameterException
     */
    protected function invokeValidation(string $method, $paramValue): ?bool {
        if (method_exists($this, $method)) {
            return $this->{$method}($paramValue);
        } elseif (method_exists($this, $this->{$method})) {
            return $this->{$this->{$method}}($paramValue);
        }
        throw new InvalidParameterException(
            'Method "' . $this->{$method} . '" does not exist',
            InvalidParameterException::INVALID_PARAMETER
        );
    }

    protected function validateCategoryId($categoryId): ?bool {
        return $this->validateId($categoryId);
    }

    protected function validateCategoryPId($categoryPId): ?bool {
        return $this->validatePId($categoryPId);
    }

    protected function validateBrandId($brandId): ?bool {
        return $this->validateId($brandId);
    }

    protected function validateBrandsList($brandsList): ?bool {
        return $this->validateIdList($brandsList);
    }

    protected function validateCategoryIdList($categoryIdList): ?bool {
        return $this->validateIdList($categoryIdList);
    }

    protected function validateCustomTagsSearchList($customTagsSearchList): ?bool {
        return $this->validateIdList($customTagsSearchList);
    }

    protected function validateIncludeSubcategories($includeSubcategories): ?bool {
        return $this->validateBoolean($includeSubcategories);
    }

    protected function validateIncludeOptions($includeOptions): ?bool {
        return $this->validateBoolean($includeOptions);
    }

    protected function validateOnlyFeatured($onlyFeatured): ?bool {
        return $this->validateBoolean($onlyFeatured);
    }

    protected function validateOnlyOffers($onlyOffers): ?bool {
        return $this->validateBoolean($onlyOffers);
    }

    protected function validateAddDefaultOptionsPrice($addDefaultOptionsPrice): ?bool {
        return $this->validateBoolean($addDefaultOptionsPrice);
    }

    protected function validateOptionsPriceMode($optionsPriceMode): ?bool {
        return $this->validateEnumerateValue($optionsPriceMode, OptionsPriceMode::class);
    }

    protected function validateDefaultOptionsPriceSort($defaultOptionsPriceSort): ?bool {
        return $this->validateEnumerateValues($defaultOptionsPriceSort, ProductOptionsPriceSort::class);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, ProductSort::class);
    }

    protected function validateStockType($stockType): ?bool {
        return $this->validateEnumerateValue($stockType, StockType::class);
    }

    protected function validateFromPrice($fromPrice): ?bool {
        $fromPrice = filter_var($fromPrice, FILTER_VALIDATE_FLOAT);
        if ($fromPrice !== false && $fromPrice >= 0) {
            return true;
        }
        return null;
    }

    protected function validateToPrice($toPrice): ?bool {
        return $this->validateFromPrice($toPrice);
    }

    protected function validatePortalId($portalId): ?bool {
        return $this->validateId($portalId);
    }

    protected function validateQDeep($qDeep): ?bool {
        return $this->validateEnumerateValue($qDeep, ProductSearchDeep::class);
    }

    protected function validateQType($qType): ?bool {
        return $this->validateEnumerateValue($qType, ProductSearchType::class);
    }

    protected function validateCustomTagsSearchType($customTagsSearchType): ?bool {
        return $this->validateEnumerateValue($customTagsSearchType, CustomTagsSearchType::class);
    }

    protected function validateThirdPartySort($thirdPartySort): ?bool {
        return $this->validateBoolean($thirdPartySort);
    }

    protected function validateShowFilters($showFilters): ?bool {
        return $this->validateBoolean($showFilters);
    }

    protected function validateDiscountId($discountId): ?bool {
        return $this->validateId($discountId);
    }

    protected function validateTaxIncluded($taxIncluded): ?bool {
        return $this->validateBoolean($taxIncluded);
    }
}
