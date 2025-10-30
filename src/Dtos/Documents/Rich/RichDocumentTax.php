<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\TaxType;

/**
 * This is the rich document tax class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentTax::getName()
 * @see RichDocumentTax::getModality()
 * @see RichDocumentTax::getTaxRate()
 * @see RichDocumentTax::getReRate()
 * @see RichDocumentTax::getBase()
 * @see RichDocumentTax::getBaseWithDiscounts()
 * @see RichDocumentTax::getTaxPrice()
 * @see RichDocumentTax::getRePrice()
 * @see RichDocumentTax::getTotalPrice()
 * @see RichDocumentTax::getDiscount()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
abstract class RichDocumentTax extends Element{
    use ElementTrait, EnumResolverTrait;

    protected string $name = '';
    
    protected string $modality = '';
    
    protected float $taxRate = 0.0;
    
    protected string $base = '';
    
    protected string $baseWithDiscounts = '';
    
    protected string $taxPrice = '';
    
    protected string $totalPrice = '';
    
    protected string $discount = '';

    protected string $type = '';

    /**
     * Returns the rich document tax name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the rich document tax modality.
     *
     * @return string
     */
    public function getModality(): string {
        return $this->modality;
    }

    /**
     * Returns the rich document tax taxRate.
     *
     * @return float
     */
    public function getTaxRate(): float {
        return $this->taxRate;
    }

    /**
     * Returns the rich document tax base.
     *
     * @return string
     */
    public function getBase(): string {
        return $this->base;
    }

    /**
     * Returns the rich document tax baseWithDiscounts.
     *
     * @return string
     */
    public function getBaseWithDiscounts(): string {
        return $this->baseWithDiscounts;
    }

    /**
     * Returns the rich document tax taxPrice.
     *
     * @return string
     */
    public function getTaxPrice(): string {
        return $this->taxPrice;
    }

    /**
     * Returns the rich document tax totalPrice.
     *
     * @return string
     */
    public function getTotalPrice(): string {
        return $this->totalPrice;
    }

    /**
     * Returns the rich document tax discount.
     *
     * @return string
     */
    public function getDiscount(): string {
        return $this->discount;
    }

    /**
     * Returns the document tax type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(TaxType::class, $this->type, TaxType::LOGICOMMERCE);
    }
}
