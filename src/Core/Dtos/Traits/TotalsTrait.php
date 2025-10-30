<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the totals trait.
 *
 * @see TotalsTrait::getTotalTaxes()
 * @see TotalsTrait::getTotalDiscounts()
 * @see TotalsTrait::getTotalVouchers()
 * @see TotalsTrait::getTotal()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait TotalsTrait {

    protected float $totalTaxes = 0.0;

    protected float $totalDiscounts = 0.0;

    protected float $totalVouchers = 0.0;

    protected float $total = 0.0;

    /**
     * Returns the basket taxes total.
     *
     * @return float
     */
    public function getTotalTaxes(): float {
        return $this->totalTaxes;
    }

    /**
     * Returns the basket discounts total.
     *
     * @return float
     */
    public function getTotalDiscounts(): float {
        return $this->totalDiscounts;
    }

    /**
     * Returns the basket vouchers total.
     *
     * @return float
     */
    public function getTotalVouchers(): float {
        return $this->totalVouchers;
    }

    /**
     * Returns the basket total.
     *
     * @return float
     */
    public function getTotal(): float {
        return $this->total;
    }
}
