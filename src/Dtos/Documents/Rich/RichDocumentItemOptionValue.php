<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document item option value class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentItemOptionValue::getWeight();
 * @see RichDocumentItemOptionValue::getPrice();
 * @see RichDocumentItemOptionValue::getPriceWithTaxes();
 * @see RichDocumentItemOptionValue::getPreviousPrice();
 * @see RichDocumentItemOptionValue::getPreviousPriceWithTaxes();
 * @see RichDocumentItemOptionValue::getValue();
 * @see RichDocumentItemOptionValue::getOptionValuePId();
 * @see RichDocumentItemOptionValue::getNoReturn();
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentItemOptionValue extends Element{
    use ElementTrait;

    protected float $weight = 0.0;

    protected string $price = '';

    protected string $priceWithTaxes = '';

    protected string $previousPrice = '';

    protected string $previousPriceWithTaxes = '';

    protected string $value = '';

    protected string $optionValuePId = '';

    protected bool $noReturn = false;

    /**
     * Returns the rich document item option value weight.
     *
     * @return float
     */
    public function getWeight(): float {
        return $this->weight;
    }

    /**
     * Returns the rich document item option value price.
     *
     * @return string
     */
    public function getPrice(): string {
        return $this->price;
    }

    /**
     * Returns the rich document item option value priceWithTaxes.
     *
     * @return string
     */
    public function getPriceWithTaxes(): string {
        return $this->priceWithTaxes;
    }

    /**
     * Returns the rich document item option value previousPrice.
     *
     * @return string
     */
    public function getPreviousPrice(): string {
        return $this->previousPrice;
    }

    /**
     * Returns the rich document item option value previousPrice.
     *
     * @return string
     */
    public function getPreviousPriceWithTaxes(): string {
        return $this->previousPriceWithTaxes;
    }

    /**
     * Returns the rich document item option value previousPrice.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the rich document item option value optionValuePId.
     *
     * @return string
     */
    public function getOptionValuePId(): string {
        return $this->optionValuePId;
    }

    /**
     * Returns the rich document item option value noReturn.
     *
     * @return bool
     */
    public function getNoReturn(): bool {
        return $this->noReturn;
    }
    
}
