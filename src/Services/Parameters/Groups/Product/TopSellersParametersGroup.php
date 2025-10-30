<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Product;

use SDK\Core\Resources\Date;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Product\TopSellersParametersValidator;

/**
 * This is the product model (top sellers resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Product
 */
class TopSellersParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    protected string $categoryIdList;

    protected int $brandId;

    protected string $date;

    protected int $productsNumber;

    /**
     * Sets a list of categories internal identifiers for this parameters group.
     *
     * @param string $categoryIdList
     *
     * @return void
     */
    public function setCategoryIdList(string $categoryIdList): void {
        $this->categoryIdList = $categoryIdList;
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
     * Sets a start date for this parameters group.
     *
     * @param \DateTime $date
     *
     * @return void
     */
    public function setDate(\DateTime $date): void {
        $this->date = $date->format(Date::DATE_FORMAT);
    }

    /**
     * Sets the total expected products number for this parameters group.
     *
     * @param int $productsNumber
     *
     * @return void
     */
    public function setProductsNumber(int $productsNumber): void {
        $this->productsNumber = $productsNumber;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): TopSellersParametersValidator {
        return new TopSellersParametersValidator();
    }
}
