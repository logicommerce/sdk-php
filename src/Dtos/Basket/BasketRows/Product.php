<?php

namespace SDK\Dtos\Basket\BasketRows;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Basket\AppliedTax;
use SDK\Dtos\Basket\BasketCustomTagValue;
use SDK\Dtos\Basket\BasketRow;
use SDK\Dtos\Basket\BasketWarnings\BasketWarning;
use SDK\Dtos\Catalog\Media;
use SDK\Dtos\Catalog\Product\Combination;
use SDK\Dtos\Catalog\Product\ProductCodes;
use SDK\Core\Dtos\Factories\AppliedDiscountFactory;
use SDK\Core\Dtos\Factories\AppliedTaxFactory;
use SDK\Core\Dtos\Factories\BasketProductOptionFactory;

/**
 * This is the basket product class.
 * The basket products information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Product::getWeight()
 * @see Product::getAppliedTaxes()
 * @see Product::getAppliedDiscounts()
 * @see Product::getBasketWarnings()
 * @see Product::getBrandName()
 * @see Product::getUrlSeo()
 * @see Product::getImages()
 * @see Product::getOptions()
 * @see Product::getCombination()
 * @see Product::getCodes()
 * @see Product::getCustomTagValues()
 *
 * @see BasketRow
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Basket\BasketRows
 */
class Product extends BasketRow {
    use ElementTrait;

    protected float $weight = 0.0;
   
    protected array $appliedDiscounts = [];

    protected array $appliedTaxes = [];

    protected array $basketWarnings = [];

    protected string $urlSeo = '';

    protected ?Media $images = null;
    
    protected ?ProductCodes $codes = null;

    protected ?Combination $combination = null;

    protected array $options = [];

    protected array $customTagValues = [];

    protected string $brandName = '';

    /**
     * Returns the basket item weight.
     *
     * @return float
     */
    public function getWeight(): float {
        return $this->weight;
    }

    /**
     * Returns the basket item applied taxes.
     *
     * @return AppliedTax[]
     */
    public function getAppliedTaxes(): array {
        return $this->appliedTaxes;
    }

    protected function setAppliedTaxes(array $appliedTaxes): void {
        $this->appliedTaxes = $this->setArrayField($appliedTaxes, AppliedTaxFactory::class);
    }

    /**
     * Returns the basket item applied discounts.
     *
     * @return AppliedDiscount[]
     */
    public function getAppliedDiscounts(): array {
        return $this->appliedDiscounts;
    }

    protected function setAppliedDiscounts(array $appliedDiscounts): void {
        $this->appliedDiscounts = $this->setArrayField($appliedDiscounts, AppliedDiscountFactory::class);
    }

    /**
     * Returns the basket item warnings.
     *
     * @return BasketWarning[]
     */
    public function getBasketWarnings(): array {
        return $this->basketWarnings;
    }

    protected function setBasketWarnings(array $basketWarnings): void {
        $this->basketWarnings = $this->setArrayField($basketWarnings, BasketWarning::class);
    }

    /**
     * Returns the basket item SEO URL for the website current language.
     *
     * @return string
     */
    public function getUrlSeo(): string {
        return $this->urlSeo;
    }

    /**
     * Returns the basket item images.
     *
     * @return Media|NULL
     */
    public function getImages(): ?Media {
        return $this->images;
    }

    protected function setImages(array $images): void {
        $this->images = new Media($images);
    }

    /**
     * Returns the product options.
     *
     * @return Option[]
     */
    public function getOptions(): array {
        return $this->options;
    }

    protected function setOptions(array $options): void {
        $this->options = $this->setArrayField($options, BasketProductOptionFactory::class);
    }

    /**
     * Returns the product combination.
     *
     * @return Combination
     */
    public function getCombination(): ?Combination {
        return $this->combination;
    }

    protected function setCombination(array $combination): void {
        $this->combination = new Combination($combination);
    }

    /**
     * Returns the product codes.
     *
     * @return ProductCodes
     */
    public function getCodes(): ?ProductCodes {
        return $this->codes;
    }

    protected function setCodes(array $codes): void {
        $this->codes = new ProductCodes($codes);
    }

    /**
     * Returns the element custom tag values.
     *
     * @return BasketCustomTagValue[]
     */
    public function getCustomTagValues(): array {
        return $this->customTagValues;
    }

    protected function setCustomTagValues(array $customTagValues): void {
        $this->customTagValues = $this->setArrayField($customTagValues, BasketCustomTagValue::class);
    }

    /**
     * Returns the basket item brand name for the website current language.
     *
     * @return string
     */
    public function getBrandName(): string {
        return $this->brandName;
    }
}