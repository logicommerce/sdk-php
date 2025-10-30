<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Services\Parameters\Validators\User\CreateParametersValidator;
use SDK\Services\Parameters\Groups\User\Addresses\BillingAddressParametersGroup;
use SDK\Services\Parameters\Groups\User\Addresses\ShippingAddressParametersGroup;

/**
 * This is the user model (create user resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class CreateUserParametersGroup extends UserParametersGroup {

    protected string $email;

    protected string $password;

    protected bool $createAccount;

    protected BillingAddressParametersGroup $billingAddress;

    protected ShippingAddressParametersGroup $shippingAddress;

    /**
     * Sets the email parameter for this parameters group.
     *
     * @param string $email
     *
     * @return void
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * Sets the password parameter for this parameters group.
     *
     * @param string $password
     *
     * @return void
     */
    public function setPassword(string $password): void {
        $this->password = $password;
    }

    /**
     * Sets if an account will be created.
     *
     * @param bool $deliveryPoint
     *
     * @return void
     */
    public function setCreateAccount(bool $createAccount): void {
        $this->createAccount = $createAccount;
    }

    /**
     * Sets the billing address parameter for this parameters group.
     *
     * @param BillingAddressParametersGroup $billingAddress
     *
     * @return void
     */
    public function setBillingAddress(BillingAddressParametersGroup $billingAddress): void {
        $this->billingAddress = $billingAddress;
    }

    /**
     * Sets the shipping address parameter for this parameters group.
     *
     * @param ShippingAddressParametersGroup $shippingAddress
     *
     * @return void
     */
    public function setShippingAddress(ShippingAddressParametersGroup $shippingAddress): void {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CreateParametersValidator {
        return new CreateParametersValidator();
    }
}
