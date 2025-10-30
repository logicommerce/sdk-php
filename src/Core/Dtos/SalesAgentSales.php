<?php declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\User\SalesAgentTotals;

/**
 * This is the sales agent sales class
 *
 * @see SalesAgentSales::getSalesAgentTotals()
 *
 * @see ElementCollection
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos
 */
class SalesAgentSales extends ElementCollection {
    use ElementTrait;

    protected ?SalesAgentTotals $salesAgentTotals = null;

    /**
     * Returns the sales agent totals
     *
     * @return float
     */
    public function getSalesAgentTotals(): ?SalesAgentTotals {
        return $this->salesAgentTotals;
    }

    public function setSalesAgentTotals(array $data): void {
        $this->salesAgentTotals = new SalesAgentTotals($data);
    }

}
