<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Catalog\CombinationDataOption;
use SDK\Core\Dtos\Catalog\CombinationDataStock;
use SDK\Core\Dtos\Catalog\ProductCombinationDataPrice;
use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Common\Codes;
use SDK\Enums\CombinationDataStatus;

/**
 * This is the ProductCombinationData class.
 * The product current data will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductCombinationData::getOptions()
 * @see ProductCombinationData::getStock()
 * @see ProductCombinationData::getProductCodes()
 * @see ProductCombinationData::getStatus()
 * @see ProductCombinationData::getShowStockAlert()
 *
 * @see Element
 *
 * @uses ElementTrait
 * @uses EnumResolverTrait
 * 
 * @package SDK\Dtos\Catalog
 */
class ProductCombinationData extends Element {
    use ElementTrait, EnumResolverTrait;

    protected array $options = [];

    protected ?CombinationDataStock $stock = null;

    protected ?Codes $productCodes = null;

    protected string $status = '';

    protected bool $showStockAlert = false;

    protected ?ProductCombinationDataPrice $prices = null;

    protected ?ProductCombinationDataPrice $pricesWithTaxes = null;

    /**
     * Returns the options of the option in the filter.
     *
     * @return CombinationDataOption[]
     */
    public function getOptions(): array {
        return $this->options;
    }

    protected function setOptions(array $options): void {
        $this->options = $this->setArrayField($options, CombinationDataOption::class);
    }

    /**
     * Returns the stock object.
     *
     * @see CombinationDataStock
     * @return CombinationDataStock|NULL
     */
    public function getStock(): ?CombinationDataStock {
        return $this->stock;
    }

    protected function setStock(array $stock): void {
        $this->stock = new CombinationDataStock($stock);
    }

    /**
     * Returns the combination product codes object.
     *
     * @see Codes
     * @return Codes|NULL
     */
    public function getProductCodes(): ?Codes {
        return $this->productCodes;
    }

    protected function setProductCodes(array $productCodes): void {
        $this->productCodes = new Codes($productCodes);
    }

    /**
     * Returns the status value.
     *
     * @return string
     */
    public function getStatus(): string {
        return $this->getEnum(CombinationDataStatus::class, $this->status, CombinationDataStatus::UNAVAILABLE);
    }

    /**
     * Returns the showStockAlert value.
     *
     * @return bool
     */
    public function getShowStockAlert(): bool {
        return $this->showStockAlert;
    }

    /**
     * Returns the item prices object.
     *
     * @see ProductCombinationDataPrice
     * @return ProductCombinationDataPrice|NULL
     */
    public function getPrices(): ?ProductCombinationDataPrice {
        return $this->prices;
    }

    protected function setPrices(array $prices): void {
        $this->prices = new ProductCombinationDataPrice($prices);
    }

    /**
     * Returns the item pricesWithTaxes object.
     *
     * @see ProductCombinationDataPrice
     * @return ProductCombinationDataPrice|NULL
     */
    public function getPricesWithTaxes(): ?ProductCombinationDataPrice {
        return $this->pricesWithTaxes;
    }

    protected function setPricesWithTaxes(array $pricesWithTaxes): void {
        $this->pricesWithTaxes = new ProductCombinationDataPrice($pricesWithTaxes);
    }
}
