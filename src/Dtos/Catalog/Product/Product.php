<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Dtos\Traits\CatalogCustomTagValueTrait;
use SDK\Dtos\Catalog\Brand;
use SDK\Dtos\Catalog\Media;
use SDK\Dtos\Catalog\Product\Options\Option;
use SDK\Dtos\Catalog\ProductCombinationData;
use SDK\Dtos\Common\Tax;
use SDK\Dtos\Common\PluginAccountTax;
use SDK\Enums\ProductType;

/**
 * This is the Product class.
 * The information of API products will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Product::getCodes()
 * @see Product::getMainImages()
 * @see Product::getTotalStock()
 * @see Product::getShipping()
 * @see Product::getWeight()
 * @see Product::getMainCategory()
 * @see Product::getBrand()
 * @see Product::getSupplierId()
 * @see Product::getSupplierRegisteredUserId()
 * @see Product::getActivityLimits()
 * @see Product::getOptions()
 * @see Product::getDefinition()
 * @see Product::getCategories()
 * @see Product::getCategoryProperties()
 * @see Product::getCombinations()
 * @see Product::getLanguage()
 * @see Product::getReverseChargeVat()
 * @see Product::getTaxes()
 * @see Product::getPrices()
 * @see Product::getPricesWithTaxes()
 * @see Product::getDefaultOptionsPrices()
 * @see Product::getShippingTypeIds()
 * @see Product::getProductPrice()
 * @see Product::getOptionsPrice()
 * @see Product::getPrice()
 * @see Product::getAdditionalImages()
 * @see Product::getCombinationData()
 * @see Product::getProductType()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see CatalogCustomTagValueTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class Product extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, CatalogCustomTagValueTrait, EnumResolverTrait;

    protected ?ProductCodes $codes = null;

    protected ?Media $mainImages = null;

    protected int $totalStock = 0;

    protected bool $shipping = false;

    protected float $weight = 0.0;

    protected int $mainCategory = 0;

    protected ?Brand $brand = null;

    protected int $supplierId = 0;

    protected int $supplierRegisteredUserId = 0;

    protected array $taxes = [];

    protected array $pluginAccountTaxes = [];

    protected bool $reverseChargeVat = false;

    protected array $options = [];

    protected ?Definition $definition = null;

    protected array $categories = [];

    protected ?CategoryProperties $categoryProperties = null;

    protected array $combinations = [];

    protected ?ProductLanguage $language = null;

    protected ?ItemPrices $prices = null;

    protected ?ItemPrices $pricesWithTaxes = null;

    protected ?DefaultOptionPrices $defaultOptionsPrices = null;

    protected float $productPrice = 0.0;

    protected float $optionsPrice = 0.0;

    protected array $additionalImages = [];

    protected ?ProductCommentsAggregate $commentsAggregate = null;

    protected ?ProductCombinationData $combinationData = null;

    protected string $productType = '';

    /**
     * Returns the product codes object.
     *
     * @see ProductCodes
     * @return ProductCodes|NULL
     */
    public function getCodes(): ?ProductCodes {
        return $this->codes;
    }

    protected function setCodes(array $codes): void {
        $this->codes = new ProductCodes($codes);
    }

    /**
     * Returns the product media object.
     *
     * @see Media
     * @return Media|NULL
     */
    public function getMainImages(): ?Media {
        return $this->mainImages;
    }

    protected function setMainImages(array $mainImages): void {
        $this->mainImages = new Media($mainImages);
    }

    /**
     * Returns the product total stock.
     *
     * @return int
     */
    public function getTotalStock(): int {
        return $this->totalStock;
    }

    /**
     * Sets if the product has to be counted calculating shippings or not.
     *
     * @return bool
     */
    public function getShipping(): bool {
        return $this->shipping;
    }

    /**
     * Returns the product total weight.
     *
     * @return float
     */
    public function getWeight(): float {
        return $this->weight;
    }

    /**
     * Returns the category id where this product belongs.
     *
     * @return int
     */
    public function getMainCategory(): int {
        return $this->mainCategory;
    }

    /**
     * Returns the product brand object.
     *
     * @see Brand
     * @return Brand|NULL
     */
    public function getBrand(): ?Brand {
        return $this->brand;
    }

    protected function setBrand(array $brand): void {
        $this->brand = new Brand($brand);
    }

    /**
     * Returns the identifier of the product supplier.
     *
     * @return int
     */
    public function getSupplierId(): int {
        return $this->supplierId;
    }

    /**
     * Returns the identifier of the product supplier.
     *
     * @return int
     */
    public function getSupplierRegisteredUserId(): int {
        return $this->supplierRegisteredUserId;
    }

    /**
     * Returns the product options.
     *
     * @see Option
     * @return Option[]
     */
    public function getOptions(): array {
        return $this->options;
    }

    protected function setOptions(array $options): void {
        $this->options = $this->setArrayField($options, Option::class);
    }

    /**
     * Returns the product definition.
     *
     * @see Definition
     * @return Definition|NULL
     */
    public function getDefinition(): ?Definition {
        return $this->definition;
    }

    protected function setDefinition(array $definition): void {
        $this->definition = new Definition($definition);
    }

    /**
     * Returns the product categories.
     *
     * @see ProductCategory
     * @return ProductCategory[]
     */
    public function getCategories(): array {
        return $this->categories;
    }

    protected function setCategories(array $categories): void {
        $this->categories = $this->setArrayField($categories, ProductCategory::class);
    }

    /**
     * Returns the product main category properties.
     *
     * @see CategoryProperties
     * @return CategoryProperties|NULL
     */
    public function getCategoryProperties(): ?CategoryProperties {
        return $this->categoryProperties;
    }

    protected function setCategoryProperties(array $categoryProperties): void {
        $this->categoryProperties = new CategoryProperties($categoryProperties);
    }

    /**
     * Returns the product combinations.
     *
     * @see Combination
     * @return Combination[]
     */
    public function getCombinations(): array {
        return $this->combinations;
    }

    protected function setCombinations(array $combinations): void {
        $this->combinations = $this->setArrayField($combinations, Combination::class);
    }

    /**
     * Returns the product language object.
     *
     * @see ProductLanguage
     * @return ProductLanguage|NULL
     */
    public function getLanguage(): ?ProductLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new ProductLanguage($language);
    }

    /**
     * Sets if the product applies the reverse charge vat or not.
     *
     * @return bool
     */
    public function getReverseChargeVat(): bool {
        return $this->reverseChargeVat;
    }

    /**
     * Returns the product taxes.
     *
     * @see Tax
     * @return Tax[]
     */
    public function getTaxes(): array {
        return $this->taxes;
    }

    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, Tax::class);
    }

    /**
     * Returns de pluginAccountTaxes
     * @return PluginAccountTax[]
     */
    public function getPluginAccountTaxes(): array {
        return $this->pluginAccountTaxes;
    }

    protected function setPluginAccountTaxes(array $pluginAccountTaxes): void {
        $this->pluginAccountTaxes = $this->setArrayField($pluginAccountTaxes, PluginAccountTax::class);
    }

    /**
     * Returns the product prices.
     *
     * @see ItemPrices
     * @return ItemPrices|NULL
     */
    public function getPrices(): ?ItemPrices {
        return $this->prices;
    }

    protected function setPrices(array $prices): void {
        $this->prices = new ItemPrices($prices);
    }

    /**
     * Returns the product prices (taxes included).
     *
     * @see ItemPrices
     * @return ItemPrices|NULL
     */
    public function getPricesWithTaxes(): ?ItemPrices {
        return $this->pricesWithTaxes;
    }

    protected function setPricesWithTaxes(array $pricesWithTaxes): void {
        $this->pricesWithTaxes = new ItemPrices($pricesWithTaxes);
    }

    /**
     * Returns the product default option prices
     *
     * @see DefaultOptionPrices
     * @return DefaultOptionPrices|NULL
     */
    public function getDefaultOptionsPrices(): ?DefaultOptionPrices {
        return $this->defaultOptionsPrices;
    }

    protected function setDefaultOptionsPrices(array $defaultOptionsPrices): void {
        $this->defaultOptionsPrices = new DefaultOptionPrices($defaultOptionsPrices);
    }

    /**
     * Returns the product prices in function of the given setting.
     *
     * @see ItemPrices
     * @return ItemPrices[]
     */
    public function getShowPrices(bool $showTaxincluded): array {
        if ($showTaxincluded === true) {
            return ['prices' => $this->getPricesWithTaxes(), 'alternativePrices' => $this->getPrices()];
        } else {
            return ['prices' => $this->getPrices(), 'alternativePrices' => $this->getPricesWithTaxes()];
        }
    }

    /**
     * Returns the product price.
     *
     * @return float
     */
    public function getProductPrice(): float {
        return $this->productPrice;
    }

    /**
     * Returns the product options price.
     *
     * @return float
     */
    public function getOptionsPrice(): float {
        return $this->optionsPrice;
    }

    /**
     * Returns the product total price.
     *
     * @return float
     */
    public function getPrice(): float {
        return $this->getProductPrice() + $this->getOptionsPrice();
    }

    /**
     * Returns the product additional images
     *
     * @see AdditionalImage
     * @return AdditionalImage[]
     */
    public function getAdditionalImages(): array {
        return $this->additionalImages;
    }

    protected function setAdditionalImages(array $additionalImages): void {
        $this->additionalImages = $this->setArrayField($additionalImages, AdditionalImage::class);
    }

    /**
     * Returns the product comments aggregate object.
     *
     * @see ProductCommentsAggregate
     * @return ProductCommentsAggregate|NULL
     */
    public function getCommentsAggregate(): ?ProductCommentsAggregate {
        return $this->commentsAggregate;
    }

    protected function setCommentsAggregate(array $commentsAggregate): void {
        $this->commentsAggregate = new ProductCommentsAggregate($commentsAggregate);
    }


    /**
     * Returns the product current data object.
     *
     * @see ProductCombinationData
     * @return ProductCombinationData|NULL
     */
    public function getCombinationData(): ?ProductCombinationData {
        return $this->combinationData;
    }

    protected function setCombinationData(array $combinationData): void {
        $this->combinationData = new ProductCombinationData($combinationData);
    }

     /**
     * Returns the page type.
     *
     * @return string
     */
    public function getProductType(): string {
        return $this->getEnum(ProductType::class, $this->productType, ProductType::PRODUCT);
    }
}
