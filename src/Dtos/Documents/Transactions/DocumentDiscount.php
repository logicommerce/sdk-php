<?php

namespace SDK\Dtos\Documents\Transactions;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementValueWithTaxesTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the document discount class.
 * The document discounts will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentDiscount::getValue()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 * @see ElementValueWithTaxesTrait
 *
 * @package SDK\Dtos\Documents\Transactions
 */
class DocumentDiscount extends Element {
    use ElementTrait, IdentifiableElementTrait, ElementNameTrait, ElementDescriptionTrait, ElementValueWithTaxesTrait;

    protected float $value = 0;

    /**
     * Returns discount value.
     *
     * @return float
     */
    public function getValue(): float {
        return $this->value;
    }
}
