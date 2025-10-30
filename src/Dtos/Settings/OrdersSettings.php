<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the order settings class.
 * The order settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see OrdersSettings::getRecoverOrderDays()
 * @see OrdersSettings::getFaresByShippingAddress()
 * @see OrdersSettings::getAddStockOnReturns()
 * @see OrdersSettings::getForceBillingAddressCountry()
 * @see OrdersSettings::getRecurrentOrdersPeriodDays()
 * @see OrdersSettings::getRecurrentMinOrdersInPeriod()
 * @see OrdersSettings::getReturnStates()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class OrdersSettings extends Element {
    use ElementTrait;

    protected int $recoverOrderDays = 0;

    protected bool $faresByShippingAddress = false;

    protected bool $addStockOnReturns = false;

    protected bool $forceBillingAddressCountry = false;

    protected int $recurrentOrdersPeriodDays = 0;

    protected int $recurrentMinOrdersInPeriod = 0;

    protected int $desistanceDays = 14;

    protected array $returnStates = [];

    /**
     * Returns the order settings recover order days.
     *
     * @return int
     */
    public function getRecoverOrderDays(): int {
        return $this->recoverOrderDays;
    }

    /**
     * Returns the order settings fares by shipping address.
     *
     * @return bool
     */
    public function getFaresByShippingAddress(): bool {
        return $this->faresByShippingAddress;
    }

    /**
     * Returns the order settings add stock on returns.
     *
     * @return bool
     */
    public function getAddStockOnReturns(): bool {
        return $this->addStockOnReturns;
    }

    /**
     * Returns the order settings force billing address country.
     *
     * @return bool
     */
    public function getForceBillingAddressCountry(): bool {
        return $this->forceBillingAddressCountry;
    }

    /**
     * Returns the order settings recurrent orders period days.
     *
     * @return int
     */
    public function getRecurrentOrdersPeriodDays(): int {
        return $this->recurrentOrdersPeriodDays;
    }

    /**
     * Returns the order settings recurrent min orders in period.
     *
     * @return int
     */
    public function getRecurrentMinOrdersInPeriod(): int {
        return $this->recurrentMinOrdersInPeriod;
    }

    /**
     * Returns the numerical value specifying the maximum number of days allowed for a user to claim the right of withdrawal on an order or part of it..
     *
     * @return int
     */
    public function getDesistanceDays(): int {
        return $this->desistanceDays;
    }

    /**
     * Returns the order settings return states.
     *
     * @return int[]
     */
    public function getReturnStates(): array {
        return $this->returnStates;
    }
}
