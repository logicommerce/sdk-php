<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the ProductRowPinnedPriceRequest Parameters comment validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class ProductRowPinnedPriceRequestParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['amount'];

    protected function validateCurrencyCode($currencyCode): ?bool {
        return $this->validateString($currencyCode);
    }

    protected function validateAmount($amount): ?bool {
        return $this->validateFloatNumeric($amount);
    }
}
