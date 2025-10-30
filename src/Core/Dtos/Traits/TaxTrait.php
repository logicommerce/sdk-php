<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the tax trait.
 *
 * @see TaxTrait::getBase()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait TaxTrait {

    protected float $base = 0.0;

    /**
     * Returns the tax base.
     *
     * @return float
     */
    public function getBase(): float {
        return $this->base;
    }
}
