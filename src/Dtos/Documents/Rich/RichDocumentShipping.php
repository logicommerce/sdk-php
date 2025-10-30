<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Factories\RichDocumentElementTaxFactory;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\ShippingCalculation;

/**
 * This is the rich document shipping class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentShipping::getName()
 * @see RichDocumentShipping::getPrice()
 * @see RichDocumentShipping::getPriceWithTaxes()
 * @see RichDocumentShipping::getPriceWithDiscounts()
 * @see RichDocumentShipping::getPriceWithDiscountsWithTaxes()
 * @see RichDocumentShipping::getShippingTypeName()
 * @see RichDocumentShipping::getShippingSectionId()
 * @see RichDocumentShipping::getShippingCalculation()
 * @see RichDocumentShipping::getShipperId()
 * @see RichDocumentShipping::getShippingTypePId()
 * @see RichDocumentShipping::getTaxes()
 * @see RichDocumentShipping::getDiscounts()
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentShipping extends Element{
    use ElementTrait, EnumResolverTrait;
    
    protected string $name = '';

    protected string $price = '';

    protected string $priceWithTaxes = '';

    protected string $priceWithDiscounts = '';
    
    protected string $priceWithDiscountsWithTaxes = '';
    
    protected string $shippingTypeName = '';
    
    protected int $shippingSectionId = 0;
    
    protected string $shippingCalculation = '';
    
    protected string $shipperId = '';
    
    protected string $shippingTypePId = '';
    
    protected array $taxes = [];
    
    protected array $discounts = [];

    /**
     * Returns the rich document shipping name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the rich document shipping price.
     *
     * @return string
     */
    public function getPrice(): string {
        return $this->price;
    }

    /**
     * Returns the rich document shipping priceWithTaxes.
     *
     * @return string
     */
    public function getPriceWithTaxes(): string {
        return $this->priceWithTaxes;
    }

    /**
     * Returns the rich document shipping priceWithDiscounts.
     *
     * @return string
     */
    public function getPriceWithDiscounts(): string {
        return $this->priceWithDiscounts;
    }

    /**
     * Returns the rich document shipping priceWithDiscountsWithTaxes.
     *
     * @return string
     */
    public function getPriceWithDiscountsWithTaxes(): string {
        return $this->priceWithDiscountsWithTaxes;
    }

    /**
     * Returns the rich document shipping shippingTypeName.
     *
     * @return string
     */
    public function getShippingTypeName(): string {
        return $this->shippingTypeName;
    }

    /**
     * Returns the rich document shipping shippingSectionId.
     *
     * @return int
     */
    public function getShippingSectionId(): int {
        return $this->shippingSectionId;
    }

    /**
     * Returns the rich document shipment shippingCalculation.
     *
     * @return string
     */
    public function getShippingCalculation(): string {
        return $this->getEnum(ShippingCalculation::class, $this->shippingCalculation, ShippingCalculation::BY_UNITS);
    }

    /**
     * Returns the rich document shipping shipperId.
     *
     * @return string
     */
    public function getShipperId(): string {
        return $this->shipperId;
    }

    /**
     * Returns the rich document shipping shippingTypePId.
     *
     * @return string
     */
    public function getShippingTypePId(): string {
        return $this->shippingTypePId;
    }

    /**
     * Returns the rich document shipping taxes.
     *
     * @return RichDocumentElementTax[]
     */
    public function getTaxes(): array {
        return $this->taxes;
    }

    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, RichDocumentElementTaxFactory::class);
    }

    /**
     * Returns the rich document shipping taxes. 
     *
     * @return RichDocumentDiscount[]
     */
    public function getDiscounts(): array {
        return $this->discounts;
    }

    protected function setDiscounts(array $discounts): void {
        $this->discounts = $this->setArrayField($discounts, RichDocumentDiscount::class);
    }

}
