<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the session basket aggregate data class.
 * The session basket aggregate data will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see SessionAggregateBasket::getProducts()
 * @see SessionAggregateBasket::getGifts()
 * @see SessionAggregateBasket::getTotalProducts()
 * @see SessionAggregateBasket::getBundles()
 * @see SessionAggregateBasket::getTotal()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos
 */
class SessionAggregateBasket extends Element {
    use ElementTrait;

    protected int $products = 0;

    protected int $gifts = 0;

    protected int $totalProducts = 0;

    protected int $bundles = 0;

    protected float $total = 0.0;

    /**
     * Returns the basket total of products.
     *
     * @return int
     */
    public function getProducts(): int {
        return $this->products;
    }

    /**
     * Returns the basket total of gifts.
     *
     * @return int
     */
    public function getGifts(): int {
        return $this->gifts;
    }
    
    /**
     * Returns the basket total of totalProducts.
     *
     * @return int
     */
    public function getTotalProducts(): int {
        return $this->totalProducts;
    }

    /**
     * Returns the basket total of bundles.
     *
     * @return int
     */
    public function getBundles(): int {
        return $this->bundles;
    }

    /**
     * Returns the basket total of amount.
     *
     * @return float
     */
    public function getTotal(): float {
        return $this->total;
    }
}
