<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\SetBasketAddressesBookParametersValidator;

/**
 * This is the basket model (set addresses) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class SetBasketAddressesBookParametersGroup extends ParametersGroup {

    protected int $billingAddressId;

    protected int $shippingAddressId;

    protected bool $useShippingAddress;

    /**
     * Sets the billingAddressId parameter for this parameters group.
     *
     * @param int $billingAddressId
     *
     * @return void
     */
    public function setBillingAddressId(int $billingAddressId): void {
        $this->billingAddressId = $billingAddressId;
    }

    /**
     * Sets the shippingAddressId parameter for this parameters group.
     *
     * @param int $shippingAddressId
     *
     * @return void
     */
    public function setShippingAddressId(int $shippingAddressId): void {
        $this->shippingAddressId = $shippingAddressId;
    }

    /**
     * Sets the useShippingAddress parameter for this parameters group.
     *
     * @param bool $useShippingAddress
     *
     * @return void
     */
    public function setUseShippingAddress(bool $useShippingAddress): void {
        $this->useShippingAddress = $useShippingAddress;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): SetBasketAddressesBookParametersValidator {
        return new SetBasketAddressesBookParametersValidator();
    }
}
