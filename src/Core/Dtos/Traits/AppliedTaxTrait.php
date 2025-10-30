<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the applied tax trait.
 *
 * @see AppliedTaxTrait::getApplyTax()
 * @see AppliedTaxTrait::getTaxValue()
 *
 * @see TaxTrait
 *
 * @package SDK\Core\Dtos\Traits
 */
trait AppliedTaxTrait {
    use TaxTrait;

    protected bool $applyTax = false;

    protected float $taxValue = 0.0;

    /**
     * Returns if the tax has to be applied.
     *
     * @return bool
     */
    public function getApplyTax(): bool {
        return $this->applyTax;
    }

    /**
     * Returns the applied tax value.
     *
     * @return float
     */
    public function getTaxValue(): float {
        return $this->taxValue;
    }
}
