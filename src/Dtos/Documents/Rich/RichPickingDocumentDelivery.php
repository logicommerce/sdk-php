<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Factories\RichDocumentElementTaxFactory;
use SDK\Core\Dtos\Factories\RichPickingModeDocumentDeliveryFactory;

/**
 * This is the rich shipping document delivery class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 * 
 * @see RichPickingDocumentDelivery::getPrice()
 * @see RichPickingDocumentDelivery::getPriceWithTaxes()
 * @see RichPickingDocumentDelivery::getTaxes()
 * @see RichPickingDocumentDelivery::getMode()
 * 
 * @see RichDocumentDelivery
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichPickingDocumentDelivery extends RichDocumentDelivery {

    protected string $price = '';

    protected string $priceWithTaxes = '';

    protected array $taxes = [];

    protected ?RichPickingModeDocumentDelivery $mode = null;

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
     * Returns the rich document item taxes.
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
     * Returns the rich document mode.
     *
     * @return RichPickingModeDocumentDelivery|NULL
     */
    public function getMode(): ?RichPickingModeDocumentDelivery {
        return $this->mode;
    }

    protected function setMode(array $mode): void {
        $this->mode = RichPickingModeDocumentDeliveryFactory::getElement($mode);
    }
}
