<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Services\Parameters\Groups\Account\Addresses\AccountInvoicingAddressCompatibleParametersGroup;
use SDK\Services\Parameters\Groups\Account\Addresses\AccountShippingAddressParametersGroup;
use SDK\Services\Parameters\Validators\Account\CreateAccountParametersValidator;

/**
 * This is the create account parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class CreateAccountParametersGroup extends AccountParametersGroup {

    protected string $type;

    protected bool $useBasketCustomerAsBase;

    protected ?MasterParametersGroup $master;

    protected ?AccountInvoicingAddressCompatibleParametersGroup $invoicingAddress;

    protected ?AccountShippingAddressParametersGroup $shippingAddress;

    protected string $groupPId;

    protected bool $postLogin;

    protected string $description;

    /**
     * Sets the type parameter for this parameters group.
     *
     * @param string $type
     *
     * @return void
     */
    public function setType(string $type): void {
        $this->type = $type;
    }

    /**
     * Sets the useBasketCustomerAsBase parameter for this parameters group.
     * 
     * @param bool $useBasketCustomerAsBase
     *
     * @return void
     */
    public function setUseBasketCustomerAsBase(bool $useBasketCustomerAsBase): void {
        $this->useBasketCustomerAsBase = $useBasketCustomerAsBase;
    }

    /**
     * Sets the master parameter for this parameters group.
     *
     * @param MasterParametersGroup $master
     *
     * @return void
     */

    public function setMaster(MasterParametersGroup $master): void {
        $this->master = $master;
    }

    /**
     * Sets the invoicing address parameter for this parameters group.
     * 
     * @param AccountInvoicingAddressCompatibleParametersGroup $invoicingAddress
     *
     * @return void
     */
    public function setInvoicingAddress(AccountInvoicingAddressCompatibleParametersGroup $invoicingAddress): void {
        $this->invoicingAddress = $invoicingAddress;
    }

    /**
     * Sets the shipping address parameter for this parameters group.
     *
     * @param AccountShippingAddressParametersGroup $shippingAddress
     *
     * @return void
     */
    public function setShippingAddress(AccountShippingAddressParametersGroup $shippingAddress): void {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * Sets the group public identifier parameter for this parameters group.
     *
     * @param string $groupPId
     *
     * @return void
     */
    public function setGroupPId(string $groupPId): void {
        $this->groupPId = $groupPId;
    }

    /**
     * Sets the post login parameter for this parameters group.
     *
     * @param bool $postLogin
     *
     * @return void
     */
    public function setPostLogin(bool $postLogin): void {
        $this->postLogin = $postLogin;
    }

    /**
     * Sets the description parameter for this parameters group.
     *
     * @param string $description
     *
     * @return void
     */
    public function setDescription(string $description): void {
        $this->description = $description;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CreateAccountParametersValidator {
        return new CreateAccountParametersValidator();
    }
}
