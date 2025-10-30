<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document total class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentTotal::getTotalRows()
 * @see RichDocumentTotal::getTotalRowsWithTaxes()
 * @see RichDocumentTotal::getTotalShippingsWithDiscounts()
 * @see RichDocumentTotal::getTotalShippingsWithDiscountsWithTaxes()
 * @see RichDocumentTotal::getTotalPaymentSystem()
 * @see RichDocumentTotal::getTotalPaymentSystemWithTaxes()
 * @see RichDocumentTotal::getTotal()
 * @see RichDocumentTotal::getTotalWithDiscounts()
 * @see RichDocumentTotal::getTotalTaxesValue()
 * @see RichDocumentTotal::getTotalWithDiscountsWithTaxes()
 * @see RichDocumentTotal::getTotalRowsDiscountsValue()
 * @see RichDocumentTotal::getTotalBasketDiscountsValue()
 * @see RichDocumentTotal::getTotalShippingDiscountsValue()
 * @see RichDocumentTotal::getTotalVouchers()
 * @see RichDocumentTotal::getTotalPicking()
 * @see RichDocumentTotal::getTotalPickingWithTaxes()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentTotal extends Element {
    use ElementTrait;

    protected string $totalRows = '';

    protected string $totalRowsWithTaxes = '';

    protected string $totalShippingsWithDiscounts = '';

    protected string $totalShippingsWithDiscountsWithTaxes = '';

    protected string $totalPaymentSystem = '';

    protected string $totalPaymentSystemWithTaxes = '';

    protected string $total = '';

    protected string $totalWithDiscounts = '';

    protected string $totalTaxesValue = '';

    protected string $totalWithDiscountsWithTaxes = '';

    protected string $totalRowsDiscountsValue = '';

    protected string $totalBasketDiscountsValue = '';

    protected string $totalShippingDiscountsValue = '';

    protected string $totalVouchers = '';

    protected string $totalPicking = '';

    protected string $totalPickingWithTaxes = '';

    /**
     * Returns the rich document total totalRows.
     *
     * @return string
     */
    public function getTotalRows(): string {
        return $this->totalRows;
    }

    /**
     * Returns the rich document total totalRowsWithTaxes.
     *
     * @return string
     */
    public function getTotalRowsWithTaxes(): string {
        return $this->totalRowsWithTaxes;
    }

    /**
     * Returns the rich document total totalShippingsWithDiscounts.
     * 
     * @return string
     */
    public function getTotalShippingsWithDiscounts(): string {
        return $this->totalShippingsWithDiscounts;
    }

    /**
     * Returns the rich document total totalShippingsWithDiscountsWithTaxes.
     * 
     * @return string
     */
    public function getTotalShippingsWithDiscountsWithTaxes(): string {
        return $this->totalShippingsWithDiscountsWithTaxes;
    }

    /**
     * Returns the rich document total totalPaymentSystem.
     * 
     * @return string
     */
    public function getTotalPaymentSystem(): string {
        return $this->totalPaymentSystem;
    }

    /**
     * Returns the rich document total totalPaymentSystemWithTaxes.
     * 
     * @return string
     */
    public function getTotalPaymentSystemWithTaxes(): string {
        return $this->totalPaymentSystemWithTaxes;
    }

    /**
     * Returns the rich document total total.
     * 
     * @return string
     */
    public function getTotal(): string {
        return $this->total;
    }

    /**
     * Returns the rich document total totalWithDiscounts.
     * 
     * @return string
     */
    public function getTotalWithDiscounts(): string {
        return $this->totalWithDiscounts;
    }

    /**
     * Returns the rich document total totalTaxesValue.
     * 
     * @return string
     */
    public function getTotalTaxesValue(): string {
        return $this->totalTaxesValue;
    }

    /**
     * Returns the rich document total totalWithDiscountsWithTaxes.
     * 
     * @return string
     */
    public function getTotalWithDiscountsWithTaxes(): string {
        return $this->totalWithDiscountsWithTaxes;
    }

    /**
     * Returns the rich document total totalRowsDiscountsValue.
     * 
     * @return string
     */
    public function getTotalRowsDiscountsValue(): string {
        return $this->totalRowsDiscountsValue;
    }

    /**
     * Returns the rich document total totalBasketDiscountsValue.
     * 
     * @return string
     */
    public function getTotalBasketDiscountsValue(): string {
        return $this->totalBasketDiscountsValue;
    }

    /**
     * Returns the rich document total totalShippingDiscountsValue.
     * 
     * @return string
     */
    public function getTotalShippingDiscountsValue(): string {
        return $this->totalShippingDiscountsValue;
    }

    /**
     * Returns the rich document total totalVouchers.
     * 
     * @return string
     */
    public function getTotalVouchers(): string {
        return $this->totalVouchers;
    }

    /**
     * Returns the rich document total totalPicking.
     * 
     * @return string
     */
    public function getTotalPicking(): string {
        return $this->totalPicking;
    }

    /**
     * Returns the rich document total totalPickingWithTaxes.
     * 
     * @return string
     */
    public function getTotalPickingWithTaxes(): string {
        return $this->totalPickingWithTaxes;
    }
}
