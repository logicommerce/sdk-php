<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document item prices class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentItemPrices::getProductPrice()
 * @see RichDocumentItemPrices::getProductPriceWithTaxes()
 * @see RichDocumentItemPrices::getOptionsPrice()
 * @see RichDocumentItemPrices::getOptionsPriceWithTaxes()
 * @see RichDocumentItemPrices::getPreviousPrice()
 * @see RichDocumentItemPrices::getPreviousPriceWithTaxes()
 * @see RichDocumentItemPrices::getPrice()
 * @see RichDocumentItemPrices::getPriceWithTaxes()
 * @see RichDocumentItemPrices::getTotalTaxesValue()
 * @see RichDocumentItemPrices::getTotalDiscountsValue()
 * @see RichDocumentItemPrices::getTotal()
 * @see RichDocumentItemPrices::getTotalWithDiscounts()
 * @see RichDocumentItemPrices::getTotalWithDiscountsWithTaxes()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentItemPrices extends Element{
    use ElementTrait;

    protected string $productPrice = '';
    
    protected string $productPriceWithTaxes = '';
    
    protected string $optionsPrice = '';
    
    protected string $optionsPriceWithTaxes = '';
    
    protected string $previousPrice = '';
    
    protected string $previousPriceWithTaxes = '';
    
    protected string $price = '';
    
    protected string $priceWithTaxes = '';
    
    protected string $totalTaxesValue = '';
    
    protected string $totalDiscountsValue = '';
    
    protected string $total = '';
    
    protected string $totalWithDiscounts = '';

    protected string $totalWithDiscountsWithTaxes = '';

    /**
     * Returns the rich document item prices productPrice.
     *
     * @return string
     */
    public function getProductPrice(): string {
        return $this->productPrice;
    }

    /**
     * Returns the rich document item prices productPriceWithTaxes.
     *
     * @return string
     */
    public function getProductPriceWithTaxes(): string {
        return $this->productPriceWithTaxes;
    }

    /**
     * Returns the rich document item prices optionsPrice.
     *
     * @return string
     */
    public function getOptionsPrice(): string {
        return $this->optionsPrice;
    }

    /**
     * Returns the rich document item prices optionsPriceWithTaxes.
     *
     * @return string
     */
    public function getOptionsPriceWithTaxes(): string {
        return $this->optionsPriceWithTaxes;
    }

    /**
     * Returns the rich document item prices previousPrice.
     *
     * @return string
     */
    public function getPreviousPrice(): string {
        return $this->previousPrice;
    }

    /**
     * Returns the rich document item prices previousPriceWithTaxes.
     *
     * @return string
     */
    public function getPreviousPriceWithTaxes(): string {
        return $this->previousPriceWithTaxes;
    }

    /**
     * Returns the rich document item prices price.
     *
     * @return string
     */
    public function getPrice(): string {
        return $this->price;
    }

    /**
     * Returns the rich document item prices priceWithTaxes.
     *
     * @return string
     */
    public function getPriceWithTaxes(): string {
        return $this->priceWithTaxes;
    }

    /**
     * Returns the rich document item prices totalTaxesValue.
     *
     * @return string
     */
    public function getTotalTaxesValue(): string {
        return $this->totalTaxesValue;
    }

    /**
     * Returns the rich document item prices totalDiscountsValue.
     *
     * @return string
     */
    public function getTotalDiscountsValue(): string {
        return $this->totalDiscountsValue;
    }

    /**
     * Returns the rich document item prices total.
     *
     * @return string
     */
    public function getTotal(): string {
        return $this->total;
    }

    /**
     * Returns the rich document item prices totalWithDiscounts.
     *
     * @return string
     */
    public function getTotalWithDiscounts(): string {
        return $this->totalWithDiscounts;
    }

    /**
     * Returns the rich document item prices totalWithDiscountsWithTaxes.
     *
     * @return string
     */
    public function getTotalWithDiscountsWithTaxes(): string {
        return $this->totalWithDiscountsWithTaxes;
    }

}
