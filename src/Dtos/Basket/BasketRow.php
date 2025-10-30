<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\BasketRowType;

/**
 * This is the basket item class.
 * The basket items information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BasketRow::getHash()
 * @see BasketRow::getQuantity()
 * @see BasketRow::getPrices()
 * @see BasketRow::getPricesWithTaxes()
 * @see BasketRow::getType()
 * @see BasketRow::getSubtotal()
 * @see BasketRow::getTotal()
 * 
 * @see Element
 * 
 * @uses IdentifiableElementTrait
 * @uses ElementNameTrait
 * @uses EnumResolverTrait
 *
 * @package SDK\Dtos\Basket
 */
abstract class BasketRow extends Element {
    use IdentifiableElementTrait, ElementNameTrait, EnumResolverTrait;

    protected string $hash = '';

    protected int $quantity = 0;

    protected ?BasketRowPrices $prices = null;

    protected ?BasketRowPrices $pricesWithTaxes = null;

    protected float $subtotal = 0.0;

    protected float $total = 0.0;

    protected string $type = '';

    /**
     * Returns the basket item hash.
     *
     * @return string
     */
    public function getHash(): string {
        return $this->hash;
    }

    /**
     * Returns the basket item quantity.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * Returns the basket item prices.
     *
     * @return BasketRowPrices|NULL
     */
    public function getPrices(): ?BasketRowPrices {
        return $this->prices;
    }

    protected function setPrices(array $prices): void {
        $this->prices = new BasketRowPrices($prices);
    }

    /**
     * Returns the basket item prices with taxes included.
     *
     * @return BasketRowPrices|NULL
     */
    public function getPricesWithTaxes(): ?BasketRowPrices {
        return $this->pricesWithTaxes;
    }

    protected function setPricesWithTaxes(array $pricesWithTaxes): void {
        $this->pricesWithTaxes = new BasketRowPrices($pricesWithTaxes);
    }

    /**
     * Returns the basket item type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(BasketRowType::class, $this->type, BasketRowType::PRODUCT);
    }

    /**
     * Returns the basket item subtotal (total price without taxes).
     *
     * @return float
     */
    public function getSubtotal(): float {
        return $this->subtotal;
    }

    /**
     * Returns the basket item total (total price with taxes).
     *
     * @return float
     */
    public function getTotal(): float {
        return $this->total;
    }
}
