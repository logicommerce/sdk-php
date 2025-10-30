<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Product;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\FilterIndexableParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\IdentifiableItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Product\ProductsParametersValidator;

/**
 * This is the products model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Product
 */
#[\AllowDynamicProperties]
class ProductsParametersGroup extends ParametersGroup {
    use IdentifiableItemsParametersGroupTrait, PaginableItemsParametersGroupTrait, FilterIndexableParametersGroupTrait;

    protected string $pId;

    protected string $idList;

    protected int $categoryId;

    protected string $categoryPId;

    protected string $categoryIdList;

    protected bool $includeSubcategories;

    protected bool $includeOptions = true;

    protected int $brandId;

    protected string $brandsList;

    protected string $q;

    protected string $qDeep;

    protected string $qType;

    protected string $customTagsSearchType;

    protected bool $onlyFeatured;

    protected bool $onlyOffers;

    protected bool $addDefaultOptionsPrice;

    protected string $defaultOptionsPriceSort;

    protected string $customTagsSearchList;

    protected string $sort;

    protected string $stockType;

    protected string $sortByIdList;

    protected float $fromPrice;

    protected float $toPrice;

    protected string $optionsPriceMode;

    protected int $portalId;

    protected int $randomItems;

    protected bool $thirdPartySort;

    protected bool $showFilters;

    protected int $discountId;

    protected bool $taxIncluded;

    /**
     * Sets the public identifier parameter for this parameters group.
     *
     * @param string $pId
     *
     * @return void
     */
    public function setPId(string $pId): void {
        $this->pId = $pId;
    }

    /**
     * Sets a list of internal identifiers for this parameters group.
     *
     * @param string $idList
     *
     * @return void
     */
    public function setIdList(string $idList): void {
        $this->idList = $idList;
    }

    /**
     * Sets a category internal identifier for this parameters group.
     *
     * @param int $categoryId
     *
     * @return void
     */
    public function setCategoryId(int $categoryId): void {
        $this->categoryId = $categoryId;
    }

    /**
     * Sets a list of categories internal identifiers for this parameters group.
     *
     * @param string $categoryPId
     *
     * @return void
     */
    public function setCategoryPId(string $categoryPId): void {
        $this->categoryPId = $categoryPId;
    }

    /**
     * Sets the public category identifier parameter for this parameters group.
     *
     * @param string $categoryIdList
     *
     * @return void
     */
    public function setCategoryIdList(string $categoryIdList): void {
        $this->categoryIdList = $categoryIdList;
    }

    /**
     * Sets if the elements will be filtered using this parameters group in function of if they are on subcategories.
     *
     * @param bool $includeSubcategories
     *
     * @return void
     */
    public function setIncludeSubcategories(bool $includeSubcategories): void {
        $this->includeSubcategories = $includeSubcategories;
    }

    /**
     * Sets whether to return the elements with the options block filled or empty.
     *
     * @param bool $includeOptions
     *
     * @return void
     */
    public function setIncludeOptions(bool $includeOptions): void {
        $this->includeOptions = $includeOptions;
    }

    /**
     * Sets a brand internal identifier for this parameters group.
     *
     * @param int $brandId
     *
     * @return void
     */
    public function setBrandId(int $brandId): void {
        $this->brandId = $brandId;
    }

    /**
     * Sets a list of brands internal identifiers for this parameters group.
     *
     * @param string $brandsList
     *
     * @return void
     */
    public function setBrandsList(string $brandsList): void {
        $this->brandsList = $brandsList;
    }

    /**
     * Sets a search query parameter for this parameters group.
     *
     * @param string $q
     *
     * @return void
     */
    public function setQ(string $q): void {
        $this->q = $q;
    }

    /**
     * Sets a search query deepness parameter for this parameters group.
     *
     * @param string $qDeep
     *
     * @return void
     */
    public function setQDeep(string $qDeep): void {
        $this->qDeep = $qDeep;
    }

    /**
     * Sets the type of the search query parameter for this parameters group.
     *
     * @param string $qType
     *
     * @return void
     */
    public function setQType(string $qType): void {
        $this->qType = $qType;
    }

    /**
     * Sets the type of the custom tags search query parameter for this parameters group.
     *
     * @param string $customTagsSearchType
     *
     * @return void
     */
    public function setCustomTagsSearchType(string $customTagsSearchType): void {
        $this->customTagsSearchType = $customTagsSearchType;
    }

    /**
     * Sets if the elements will be filtered using this parameters group in function of if they are featured.
     *
     * @param bool $onlyFeatured
     *
     * @return void
     */
    public function setOnlyFeatured(bool $onlyFeatured): void {
        $this->onlyFeatured = $onlyFeatured;
    }

    /**
     * Sets if the elements will be filtered using this parameters group in function of if they are on offer.
     *
     * @param bool $onlyOffers
     *
     * @return void
     */
    public function setOnlyOffers(bool $onlyOffers): void {
        $this->onlyOffers = $onlyOffers;
    }

    /**
     * Sets whether to return the prices of the default products options.
     *
     * @param bool $addDefaultOptionsPrice
     *
     * @return void
     */
    public function setAddDefaultOptionsPrice(bool $addDefaultOptionsPrice): void {
        $this->addDefaultOptionsPrice = $addDefaultOptionsPrice;
    }

    /**
     * Sets the default order of the products options.
     *
     * @param string $defaultOptionsPriceSort
     *
     * @return void
     */
    public function setDefaultOptionsPriceSort(string $defaultOptionsPriceSort): void {
        $this->defaultOptionsPriceSort = $defaultOptionsPriceSort;
    }

    /**
     * Sets a list of custom tags internal identifiers were the API must search.
     *
     * @param string $customTagsSearchList
     *
     * @return void
     */
    public function setCustomTagsSearchList(string $customTagsSearchList): void {
        $this->customTagsSearchList = $customTagsSearchList;
    }

    /**
     * Sets the stockType criteria parameter for this parameters group.
     *
     * @param string $stockType
     *
     * @return void
     */
    public function setStockType(string $stockType): void {
        $this->stockType = $stockType;
    }

    /**
     * Sets the sort criteria parameter for this parameters group.
     *
     * @param string $sort
     *
     * @return void
     */
    public function setSort(string $sort): void {
        $this->sort = $sort;
    }

    /**
     * Sets a list of internal identifiers as a sort criteria parameter for this parameters group.
     *
     * @param string $sortByIdList
     *
     * @return void
     */
    public function setSortByIdList(string $sortByIdList): void {
        $this->sortByIdList = $sortByIdList;
    }

    /**
     * Sets the minimum price parameter for this parameters group.
     *
     * @param float $fromPrice
     *
     * @return void
     */
    public function setFromPrice(float $fromPrice): void {
        $this->fromPrice = $fromPrice;
    }

    /**
     * Sets the maximum price parameter for this parameters group.
     *
     * @param float $toPrice
     *
     * @return void
     */
    public function setToPrice(float $toPrice): void {
        $this->toPrice = $toPrice;
    }

    /**
     * Sets a the prices sort criteria for this parameters group.
     *
     * @param string $optionsPriceMode
     *
     * @return void
     */
    public function setOptionsPriceMode(string $optionsPriceMode): void {
        $this->optionsPriceMode = $optionsPriceMode;
    }

    /**
     * Sets the portal internal identifier parameter for this parameters group.
     *
     * @param int $portalId
     *
     * @return void
     */
    public function setPortalId(int $portalId): void {
        $this->portalId = $portalId;
    }

    /**
     * Sets the random items parameter for this parameters group.
     *
     * @param int $randomItems
     *
     * @return void
     */
    public function setRandomItems(int $randomItems): void {
        $this->randomItems = $randomItems;
    }

    /**
     * Sets a new option filter for this parameters group.
     *
     * @param string $optionName
     * @param string $optionValue
     *
     * @return void
     */
    public function addFilterOption(string $optionName, string $optionValue): void {
        $this->addFilter('filterOption', $optionName, $optionValue);
    }

    /**
     * Sets a new custom tag filter for this parameters group.
     *
     * @param int $customTagId
     * @param string $customTagValue
     *
     * @return void
     */
    public function addFilterCustomTag(int $customTagId, string $customTagValue): void {
        $this->addFilter('filterCustomTag', $customTagId, $customTagValue);
    }

    /**
     * Sets a new custom tag interval filter for this parameters group.
     *
     * @param int $customTagId
     * @param string $customTagRangeFrom
     * @param string $customTagRangeTo
     *
     * @return void
     */
    public function addFilterCustomTagInterval(int $customTagId, string $customTagRangeFrom, string $customTagRangeTo): void {
        $this->addFilter('filterCustomTagInterval', $customTagId, $customTagRangeFrom);
        $this->addFilter('filterCustomTagInterval', $customTagId, $customTagRangeTo);
    }

    private function addFilter(string $filterName, $filterSuffix, $filterValue) {
        $filterName .= '[' . $filterSuffix . ']';
        if (!isset($this->{$filterName})) {
            $this->{$filterName} = [];
        }
        $this->{$filterName}[] = $filterValue;

        $validator = $this->getInstantiatedValidator();
        $validatorMethod = 'validate' . $filterName;
        if (!property_exists($validator, $validatorMethod)) {
            $validator->{$validatorMethod} = 'validateArray';
        }
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): ProductsParametersValidator {
        return new ProductsParametersValidator();
    }

    /**
     * Indicates that you want to preserve the ordering received by thirdparty.
     *
     * @param bool $thirdPartySort
     *
     * @return void
     */
    public function setThirdPartySort(bool $thirdPartySort): void {
        $this->thirdPartySort = $thirdPartySort;
    }

    /**
     * Indicates if you want to get the filterable values of the returned items (default is true)
     *
     * @param bool $showFilters
     *
     * @return void
     */
    public function setShowFilters(bool $showFilters): void {
        $this->showFilters = $showFilters;
    }

    /**
     * Sets the discountId parameter for this parameters group.
     *
     * @param int $discountId
     *
     * @return void
     */
    public function setDiscountId(int $discountId): void {
        $this->discountId = $discountId;
    }

    /**
     * Indicates if you want to get the price filter with tax included
     *
     * @param bool $taxIncluded
     *
     * @return void
     */
    public function setTaxIncluded(bool $taxIncluded): void {
        $this->taxIncluded = $taxIncluded;
    }
}
