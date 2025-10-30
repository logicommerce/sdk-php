<?php

namespace SDK\Dtos\Documents\Transactions;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the document total class.
 * The document total will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentTotal::getSubtotalRows()
 * @see DocumentTotal::getTotalRows()
 * @see DocumentTotal::getSubtotalShippings()
 * @see DocumentTotal::getTotalShippings()
 * @see DocumentTotal::getSubtotalPaymentSystem()
 * @see DocumentTotal::getTotalPaymentSystem()
 * @see DocumentTotal::getSubtotal()
 * @see DocumentTotal::getTotalTaxes()
 * @see DocumentTotal::getTotalRowsDiscounts()
 * @see DocumentTotal::getTotalBasketDiscounts()
 * @see DocumentTotal::getTotalShippingDiscounts()
 * @see DocumentTotal::getTotalDiscounts()
 * @see DocumentTotal::getTotalVouchers()
 * @see DocumentTotal::getTotal()
 * @see DocumentTotal::getSubtotalPicking()
 * @see DocumentTotal::getTotalPicking()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos\Documents\Transactions
 */
class DocumentTotal extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected float $subtotalRows = 0.0;

    protected float $totalRows = 0.0;

    protected float $subtotalShippings = 0.0;

    protected float $totalShippings = 0.0;

    protected float $subtotalPaymentSystem = 0.0;

    protected float $totalPaymentSystem = 0.0;

    protected float $subtotal = 0.0;

    protected float $totalTaxes = 0.0;

    protected float $totalRowsDiscounts = 0.0;

    protected float $totalBasketDiscounts = 0.0;

    protected float $totalShippingDiscounts = 0.0;

    protected float $totalDiscounts = 0.0;

    protected float $totalVouchers = 0.0;

    protected float $total = 0.0;

    protected float $subtotalPicking = 0.0;

    protected float $totalPicking = 0.0;

    /**
     * Returns amount due to detail lines before applying taxes.
     *
     * @return float
     */
    public function getSubtotalRows(): float {
        return $this->subtotalRows;
    }

    /**
     * Returns amount due to the detail lines with taxes applied.
     *
     * @return float
     */
    public function getTotalRows(): float {
        return $this->totalRows;
    }

    /**
     * Returns full amount without tax included due to shipping methods.
     *
     * @return float
     */
    public function getSubtotalShippings(): float {
        return $this->subtotalShippings;
    }

    /**
     * Returns full amount with taxes included due to shipping methods.
     *
     * @return float
     */
    public function getTotalShippings(): float {
        return $this->totalShippings;
    }

    /**
     * Returns total amount without taxes included due to the payment system.
     *
     * @return float
     */
    public function getSubtotalPaymentSystem(): float {
        return $this->subtotalPaymentSystem;
    }

    /**
     * Returns total amount with taxes included due to the payment system.
     *
     * @return float
     */
    public function getTotalPaymentSystem(): float {
        return $this->totalPaymentSystem;
    }

    /**
     * Returns sum of the previous subtotals.
     *
     * @return float
     */
    public function getSubtotal(): float {
        return $this->subtotal;
    }

    /**
     * Returns total amount due to tax application.
     *
     * @return float
     */
    public function getTotalTaxes(): float {
        return $this->totalTaxes;
    }

    /**
     * Returns total amount due to discounts applied to detail lines.
     *
     * @return float
     */
    public function getTotalRowsDiscounts(): float {
        return $this->totalRowsDiscounts;
    }

    /**
     * Returns total amount due to discounts applied to the total.
     *
     * @return float
     */
    public function getTotalBasketDiscounts(): float {
        return $this->totalBasketDiscounts;
    }

    /**
     * Returns total amount due to discounts applied to shipping methods.
     *
     * @return float
     */
    public function getTotalShippingDiscounts(): float {
        return $this->totalShippingDiscounts;
    }

    /**
     * Returns sum of the totals due to discounts applied to detail lines and applied to the total.
     *
     * @return float
     */
    public function getTotalDiscounts(): float {
        return $this->totalDiscounts;
    }

    /**
     * Returns total amount due to added gift coupons.
     *
     * @return float
     */
    public function getTotalVouchers(): float {
        return $this->totalVouchers;
    }

    /**
     * Returns total amount of the document.
     *
     * @return float
     */
    public function getTotal(): float {
        return $this->total;
    }

    /**
     * Returns subtotalPicking of the document.
     *
     * @return float
     */
    public function getSubtotalPicking(): float {
        return $this->subtotalPicking;
    }

    /**
     * Returns totalPicking of the document.
     *
     * @return float
     */
    public function getTotalPicking(): float {
        return $this->totalPicking;
    }
}
