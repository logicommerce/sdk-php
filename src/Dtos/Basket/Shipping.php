<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Factories\AppliedDiscountFactory;
use SDK\Core\Dtos\Factories\AppliedTaxFactory;

/**
 * This is the shipping class.
 * The shipping information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Shipping::getType()
 * @see Shipping::getPrices()
 * @see Shipping::getAppliedTaxes()
 * @see Shipping::getAppliedDiscounts()
 * @see Shipping::getHash()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class Shipping {
    use ElementTrait;

    protected ?ShippingType $type = null;

    protected ?ShippingPrices $prices = null;

    protected ?ShippingPrices $pricesWithTaxes = null;

    protected array $appliedTaxes = [];

    protected array $appliedDiscounts = [];

    protected string $hash = '';

    /**
     * Returns the shipping type.
     *
     * @return ShippingType|NULL
     */
    public function getType(): ?ShippingType {
        return $this->type;
    }

    protected function setType(array $type): void {
        $this->type = new ShippingType($type);
    }

    /**
     * Returns the shipping prices.
     *
     * @return ShippingPrices|NULL
     */
    public function getPrices(): ?ShippingPrices {
        return $this->prices;
    }

    protected function setPrices(array $prices): void {
        $this->prices = new ShippingPrices($prices);
    }

    /**
     * Returns the shipping prices with taxes.
     *
     * @return ShippingPrices|NULL
     */
    public function getPricesWithTaxes(): ?ShippingPrices {
        return $this->pricesWithTaxes;
    }

    protected function setPricesWithTaxes(array $pricesWithTaxes): void {
        $this->pricesWithTaxes = new ShippingPrices($pricesWithTaxes);
    }

    /**
     * Returns the shipping applied taxes.
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
     * Returns the shipping hash.
     *
     * @return string
     */
    public function getHash(): string {
        return $this->hash;
    }

    /**
     * Returns the shipping applied discounts.
     *
     * @return AppliedDiscount[]
     */
    public function getAppliedDiscounts(): array {
        return $this->appliedDiscounts;
    }

    protected function setAppliedDiscounts(array $appliedDiscounts): void {
        $this->appliedDiscounts = $this->setArrayField($appliedDiscounts, AppliedDiscountFactory::class);
    }
}
