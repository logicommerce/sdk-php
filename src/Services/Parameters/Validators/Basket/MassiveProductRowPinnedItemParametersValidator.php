<?php

namespace SDK\Services\Parameters\Validators\Basket;

/**
 * This is the validator for MassiveProductRowPinnedItemParametersGroup.
 * Requires hash in addition to the base product row pinned parameters.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class MassiveProductRowPinnedItemParametersValidator extends ProductRowPinnedRequestParametersValidator {

    protected const REQUIRED_PARAMS = ['hash'];

    protected function validateHash($hash): ?bool {
        return $this->validateString($hash);
    }
}
