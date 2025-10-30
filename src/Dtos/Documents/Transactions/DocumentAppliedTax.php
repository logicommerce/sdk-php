<?php

namespace SDK\Dtos\Documents\Transactions;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\TaxTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\TaxType;

/**
 * This is the document applied tax class.
 * The document applied taxes will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentAppliedTax::getTaxRate()
 * @see DocumentAppliedTax::getTaxValue()
 * @see DocumentAppliedTax::getApplyTax()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see TaxTrait
 *
 * @package SDK\Dtos\Documents\Transactions
 */
abstract class DocumentAppliedTax extends Element {
    use IdentifiableElementTrait, TaxTrait, EnumResolverTrait;

    protected float $taxRate = 0;

    protected float $taxValue = 0;

    protected bool $applyTax = false;

    protected string $type = '';

    /**
     * Returns the tax rate.
     *
     * @return float
     */
    public function getTaxRate(): float {
        return $this->taxRate;
    }

    /**
     * Returns amount derived from applying the tax.
     *
     * @return float
     */
    public function getTaxValue(): float {
        return $this->taxValue;
    }

    /**
     * Returns whether the tax is applied.
     *
     * @return bool
     */
    public function getApplyTax(): bool {
        return $this->applyTax;
    }

    /**
     * Returns the type of the tax.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(TaxType::class, $this->type, TaxType::LOGICOMMERCE);
    }
}
