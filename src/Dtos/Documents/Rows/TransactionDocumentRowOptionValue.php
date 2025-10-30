<?php

namespace SDK\Dtos\Documents\Rows;

/**
 * This is the transaction document row option value class.
 * The transaction document row option values will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see TransactionDocumentRowOptionValue::getWeight()
 * @see TransactionDocumentRowOptionValue::getPrice()
 * @see TransactionDocumentRowOptionValue::getPreviousPrice()
 * @see TransactionDocumentRowOptionValue::getNoReturn()
 *
 * @see DocumentRowOptionValue
 *
 * @package SDK\Dtos\Documents\Rows
 */
class TransactionDocumentRowOptionValue extends DocumentRowOptionValue {

    protected float $weight = 0;

    protected float $price = 0;

    protected float $previousPrice = 0;

    protected bool $noReturn = false;

    /**
     * Returns weight increase due to option value.
     *
     * @return float
     */
    public function getWeight(): float {
        return $this->weight;
    }

    /**
     * Returns increase in the price of the product due to the option value.
     *
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
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
     * Returns that products with this option value assigned cannot be returned.
     *
     * @return bool
     */
    public function getNoReturn(): bool {
        return $this->noReturn;
    }
}
