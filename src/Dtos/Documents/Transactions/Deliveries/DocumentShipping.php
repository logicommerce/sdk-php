<?php

namespace SDK\Dtos\Documents\Transactions\Deliveries;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Factories\DocumentAppliedTaxFactory;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Documents\Transactions\DocumentDiscount;
use SDK\Enums\ShippingCalculation;

/**
 * This is the document shipping class.
 * The document shipping will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentShipping::getShippingTypeId()
 * @see DocumentShipping::getPrice()
 * @see DocumentShipping::getShippingTypeName()
 * @see DocumentShipping::getShippingSectionId()
 * @see DocumentShipping::getShippingCalculation()
 * @see DocumentShipping::getShipperPId()
 * @see DocumentShipping::getShippingTypePId()
 * @see DocumentShipping::getTaxes()
 * @see DocumentShipping::getDiscounts()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see ElementNameTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Transactions\Deliveries
 */
class DocumentShipping extends Element {
    use ElementTrait, IdentifiableElementTrait, ElementNameTrait, EnumResolverTrait;

    protected int $shippingTypeId = 0;

    protected float $price = 0.0;

    protected float $priceWithTaxes = 0.0;

    protected string $shippingTypeName = '';

    protected int $shippingSectionId = 0;

    protected string $shippingCalculation = '';

    protected string $shipperPId = '';

    protected string $shippingTypePId = '';

    protected array $taxes = [];

    protected array $discounts = [];

    /**
     * Returns internal identifier of the shipping type.
     *
     * @return int
     */
    public function getShippingTypeId(): int {
        return $this->shippingTypeId;
    }

    /**
     * Returns shipping method price.
     *
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * Returns shipping method price with taxes.
     *
     * @return float
     */
    public function getPriceWithTaxes(): float {
        return $this->priceWithTaxes;
    }

    /**
     * Returns shipping type name for the returned language.
     *
     * @return string
     */
    public function getShippingTypeName(): string {
        return $this->shippingTypeName;
    }

    /**
     * Returns internal identifier of the range assigned to the shipping type.
     *
     * @return int
     */
    public function getShippingSectionId(): int {
        return $this->shippingSectionId;
    }

    /**
     * Returns whether the calculation of shipping costs is determined by weight or by units sold.
     *
     * @return string
     */
    public function getShippingCalculation(): string {
        return $this->getEnum(ShippingCalculation::class, $this->shippingCalculation, '');
    }

    /**
     * Returns carrier's public identifier.
     *
     * @return string
     */
    public function getShipperPId(): string {
        return $this->shipperPId;
    }

    /**
     * Returns public identifier of the shipping type.
     *
     * @return string
     */
    public function getShippingTypePId(): string {
        return $this->shippingTypePId;
    }

    /**
     * Returns information about taxes applied to the shipping method.
     *
     * @return DocumentAppliedTaxFactory[]
     */
    public function getTaxes(): array {
        return $this->taxes;
    }

    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, DocumentAppliedTaxFactory::class);
    }

    /**
     * Returns information about the discounts applied.
     *
     * @return DocumentDiscount[]
     */
    public function getDiscounts(): array {
        return $this->discounts;
    }

    protected function setDiscounts(array $discounts): void {
        $this->discounts = $this->setArrayField($discounts, DocumentDiscount::class);
    }
}
