<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Services\Parameters\Validators\Basket\MassiveProductRowPinnedItemParametersValidator;

/**
 * This is a basket product row pinned parameters group for mass pin operations.
 * Extends the base group with the hash field required to identify each basket row.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class MassiveProductRowPinnedItemParametersGroup extends ProductRowPinnedRequestParametersGroup {

    protected string $hash;

    /**
     * Sets the hash that identifies the basket row to be pinned.
     *
     * @param string $hash
     *
     * @return void
     */
    public function setHash(string $hash): void {
        $this->hash = $hash;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): MassiveProductRowPinnedItemParametersValidator {
        return new MassiveProductRowPinnedItemParametersValidator();
    }
}
