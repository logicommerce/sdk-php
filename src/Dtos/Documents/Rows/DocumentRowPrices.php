<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the document row prices class.
 * The document row prices will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentRowPrices::getProductPrice()
 * @see DocumentRowPrices::getOptionsPrice()
 * @see DocumentRowPrices::getPreviousPrice()
 * @see DocumentRowPrices::getPrice()
 * @see DocumentRowPrices::getTotalTaxes()
 * @see DocumentRowPrices::getTotal()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rows
 */
class DocumentRowPrices extends Element {
    use ElementTrait;

    protected float $productPrice = 0;

    protected float $optionsPrice = 0;

    protected float $previousPrice = 0;

    protected float $price = 0;

    protected float $totalTaxes = 0;

    protected float $total = 0;

    /**
     * Returns price of the product without adding increases due to option values.
     *
     * @return float
     */
    public function getProductPrice(): float {
        return $this->productPrice;
    }

    /**
     * Returns total increase in the price due to the different option values.
     *
     * @return float
     */
    public function getOptionsPrice(): float {
        return $this->optionsPrice;
    }

    /**
     * Returns increase in the base price of the product due to the option value in the event it has an offer price.
     *
     * @return float
     */
    public function getPreviousPrice(): float {
        return $this->previousPrice;
    }

    /**
     * Returns total amount resulting from adding the price of the product and the price of the options.
     *
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * Returns amount due to applying tax.
     *
     * @return float
     */
    public function getTotalTaxes(): float {
        return $this->totalTaxes;
    }

    /**
     * Returns total amount with taxes included.
     *
     * @return float
     */
    public function getTotal(): float {
        return $this->total;
    }
}
