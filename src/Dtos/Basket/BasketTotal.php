<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\TotalsTrait;

/**
 * This is the basket total class.
 * The basket totals information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BasketTotal::getTotalRows()
 * @see BasketTotal::getTotalShippings()
 * @see BasketTotal::getTotalPaymentSystem()
 * @see BasketTotal::getSubtotalRows()
 * @see BasketTotal::getSubtotalShippings()
 * @see BasketTotal::getSubtotalPaymentSystem()
 * @see BasketTotal::getSubtotal()
 * @see BasketTotal::getTotalQuantity()
 *
 * @see ElementTrait
 * @see TotalsTrait
 *
 * @package SDK\Dtos\Basket
 */
class BasketTotal {
    use ElementTrait, TotalsTrait;

    protected float $subtotalRows = 0.0;

    protected float $totalRows = 0.0;

    protected float $subtotalShippings = 0.0;

    protected float $totalShippings = 0.0;

    protected float $subtotalPicking = 0.0;

    protected float $totalPicking = 0.0;

    protected float $subtotalPaymentSystem = 0.0;

    protected float $totalPaymentSystem = 0.0;

    protected float $subtotal = 0.0;

    protected int $totalQuantity = 0;

    /**
     * Returns the basket rows total.
     *
     * @return float
     */
    public function getTotalRows(): float {
        return $this->totalRows;
    }

    /**
     * Returns the basket shippings total.
     *
     * @return float
     */
    public function getTotalShippings(): float {
        return $this->totalShippings;
    }

    /**
     * Returns the basket payment system total.
     *
     * @return float
     */
    public function getTotalPaymentSystem(): float {
        return $this->totalPaymentSystem;
    }

    /**
     * Returns the basket rows subtotal.
     *
     * @return float
     */
    public function getSubtotalRows(): float {
        return $this->subtotalRows;
    }

    /**
     * Returns the basket shippings subtotal.
     *
     * @return float
     */
    public function getSubtotalShippings(): float {
        return $this->subtotalShippings;
    }

    /**
     * Returns the basket payment system subtotal.
     *
     * @return float
     */
    public function getSubtotalPaymentSystem(): float {
        return $this->subtotalPaymentSystem;
    }

    /**
     * Returns the basket subtotal.
     *
     * @return float
     */
    public function getSubtotal(): float {
        return $this->subtotal;
    }

    /**
     * Returns the total quantity of all rows on the basket.
     *
     * @return int
     */
    public function getTotalQuantity(): int {
        return $this->totalQuantity;
    }

    /**
     * Returns the basket subtotalPicking.
     *
     * @return float
     */
    public function getSubtotalPicking(): float {
        return $this->subtotalPicking;
    }

    /**
     * Returns the basket totalPicking.
     *
     * @return float
     */
    public function getTotalPicking(): float {
        return $this->totalPicking;
    }
}
