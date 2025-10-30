<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Groups\Account\Addresses\AccountInvoicingAddressParametersGroup;
use SDK\Services\Parameters\Groups\Account\Addresses\AccountShippingAddressParametersGroup;
use SDK\Services\Parameters\Groups\User\UserCustomTagParametersGroup;
use SDK\Services\Parameters\Validators\Account\CompanyDivisionsParametersValidator;

/**
 * This is the company divisions parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class CompanyDivisionsParametersGroup extends ParametersGroup {

    protected CompanyDivisionMasterParametersGroup $master;

    protected AccountInvoicingAddressParametersGroup $invoicingAddress;

    protected AccountShippingAddressParametersGroup $shippingAddress;

    protected array $customTags;

    protected string $pId;

    protected string $image;

    protected string $groupPid;

    protected bool $postLogin;

    protected string $email;

    protected string $description;

    /**
     * Sets the master parameter for this parameters group.
     *
     * @param CompanyDivisionMasterParametersGroup $master
     *
     * @return void
     */
    public function setMaster(CompanyDivisionMasterParametersGroup $master): void {
        $this->master = $master;
    }

    /**
     * Sets the invoicing address parameter for this parameters group.
     *
     * @param AccountInvoicingAddressParametersGroup $invoicingAddress
     *
     * @return void
     */
    public function setInvoicingAddress(AccountInvoicingAddressParametersGroup $invoicingAddress): void {
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
     * Sets an array of custom tags as a parameter for this parameters group.
     *
     * @param UserCustomTagParametersGroup[] $customTags
     *
     * @return void
     */
    public function setCustomTags(array $customTags): void {
        $this->customTags = [];
        foreach ($customTags as $customTag) {
            $this->addCustomTag($customTag);
        }
    }

    /**
     * Adds a new custom tag to the array of custom tags for this parameters group.
     *
     * @param UserCustomTagParametersGroup $customTag
     *
     * @return void
     */
    public function addCustomTag(UserCustomTagParametersGroup $customTag): void {
        $this->customTags ??= [];
        $this->customTags[] = $customTag;
    }

    /**
     * Sets the public identifier parameter for this parameters group.
     *
     * @param string $pId
     *
     * @return void
     */
    public function setPId(string $pId): void {
        $this->pId = $pId;
    }

    /**
     * Sets the image parameter for this parameters group.
     *
     * @param string $image
     *
     * @return void
     */
    public function setImage(string $image): void {
        $this->image = $image;
    }

    /**
     * Sets the group public identifier parameter for this parameters group.
     *
     * @param string $groupPid
     *
     * @return void
     */
    public function setGroupPid(string $groupPid): void {
        $this->groupPid = $groupPid;
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
    protected function getValidator(): CompanyDivisionsParametersValidator {
        return new CompanyDivisionsParametersValidator();
    }
}
