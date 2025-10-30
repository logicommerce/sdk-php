<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Factories\RichDocumentElementTaxFactory;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document additional item class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentAdditionalItem::getName()
 * @see RichDocumentAdditionalItem::getType()
 * @see RichDocumentAdditionalItem::getAmount()
 * @see RichDocumentAdditionalItem::getTaxes()
 * 
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentAdditionalItem extends Element{
    use ElementTrait;

    protected string $name = '';

    protected string $type = '';

    protected string $amount = '';

    protected array $taxes = [];

    /**
     * Returns the rich document additional item name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the rich document additional item type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * Returns the rich document additional item amount.
     *
     * @return string
     */
    public function getAmount(): string {
        return $this->amount;
    }

    /**
     * Returns the rich document additional item taxes. 
     *
     * @return RichDocumentElementTax[]
     */
    public function getTaxes(): array {
        return $this->taxes;
    }

    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, RichDocumentElementTaxFactory::class);
    }

}
