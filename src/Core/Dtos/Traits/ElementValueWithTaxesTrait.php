<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the discount value trait.
 *
 * @see ElementValueWithTaxesTrait::getValueWithTaxes()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait ElementValueWithTaxesTrait {

    protected float $valueWithTaxes = 0.0;

    /**
     * Returns the applied discount valueWithTaxes.
     *
     * @return float
     */
    public function getValueWithTaxes(): float {
        return $this->valueWithTaxes;
    }

}
