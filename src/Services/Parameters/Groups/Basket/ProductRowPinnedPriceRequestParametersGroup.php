<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\ProductRowPinnedPriceRequestParametersValidator;

/**
 * This is the ProductRowPinnedPriceRequest parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class ProductRowPinnedPriceRequestParametersGroup extends ParametersGroup {

    protected float $amount;

    protected string $currencyCode;

    /**
     * Price amount for the indicated currency. If the currency is not indicated, the session's navigation currency will be considered.
     *
     * @param float $amount
     *
     * @return void
     */
    public function setAmount(float $amount): void {
        $this->amount = $amount;
    }

    /**
     * Currency code in which the price amount is provided, in ISO 4217 format. If not provided, the session's navigation currency will be considered.
     *
     * @param string $currencyCode
     *
     * @return void
     */
    public function setCurrencyCode(string $currencyCode): void {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): ProductRowPinnedPriceRequestParametersValidator {
        return new ProductRowPinnedPriceRequestParametersValidator();
    }
}
