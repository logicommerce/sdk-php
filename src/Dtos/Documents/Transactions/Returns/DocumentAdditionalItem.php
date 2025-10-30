<?php

namespace SDK\Dtos\Documents\Transactions\Returns;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Factories\DocumentAppliedTaxFactory;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Documents\Transactions\DocumentAppliedTax;
use SDK\Enums\AdditionalRMAItemType;

/**
 * This is the document additional item class.
 * The document additional items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentAdditionalItem::getType()
 * @see DocumentAdditionalItem::getAmount()
 * @see DocumentAdditionalItem::getTaxes()
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Transactions\Returns
 */
class DocumentAdditionalItem extends Element {
    use ElementTrait, EnumResolverTrait, ElementNameTrait;

    protected string $type = '';

    protected float $amount = 0;

    protected array $taxes = [];

    /**
     * Returns the type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(AdditionalRMAItemType::class, $this->type, '');
    }

    /**
     * Returns the amount.
     *
     * @return float
     */
    public function getAmount(): float {
        return $this->amount;
    }

    /**
     * Returns the taxes.
     *
     * @return DocumentAppliedTax[]
     */
    public function getTaxes(): array {
        return $this->taxes;
    }

    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, DocumentAppliedTaxFactory::class);
    }
}
