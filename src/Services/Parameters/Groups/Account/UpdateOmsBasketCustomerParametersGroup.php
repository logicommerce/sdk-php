<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Resources\Date;
use SDK\Services\Parameters\Groups\Account\Addresses\AccountInvoicingAddressCompatibleParametersGroup;
use SDK\Services\Parameters\Groups\Account\Addresses\AccountShippingAddressParametersGroup;
use SDK\Services\Parameters\Validators\Account\UpdateOmsBasketCustomerParametersValidator;

class UpdateOmsBasketCustomerParametersGroup extends AccountParametersGroup {

    protected string $type;

    protected string $gender;

    protected string $birthday;

    protected string $customerName;

    protected ?AccountInvoicingAddressCompatibleParametersGroup $invoicingAddress;

    protected ?AccountShippingAddressParametersGroup $shippingAddress;

    protected bool $useShippingAddress;

    protected int $selectedAccountInvoicingAddressId;

    protected int $selectedAccountShippingAddressId;

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
     * Sets the gender parameter for this parameters group.
     *
     * @param string $gender
     *
     * @return void
     */
    public function setGender(string $gender): void {
        $this->gender = $gender;
    }

    /**
     * Sets the birthday parameter for this parameters group.
     *
     * @param \DateTime $birthday
     *
     * @return void
     */
    public function setBirthday(\DateTime $birthday): void {
        $this->birthday = $birthday->format(Date::DATE_FORMAT);
    }

    /**
     * Sets the customer name parameter for this parameters group.
     *
     * @param string $customerName
     *
     * @return void
     */
    public function setCustomerName(string $customerName): void {
        $this->customerName = $customerName;
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
     * Sets the selectedAccountInvoicingAddressId parameter for this parameters group.
     *
     * @param int $selectedAccountInvoicingAddressId
     *
     * @return void
     */
    public function setSelectedAccountInvoicingAddressId(int $selectedAccountInvoicingAddressId): void {
        $this->selectedAccountInvoicingAddressId = $selectedAccountInvoicingAddressId;
    }

    /**
     * Sets the selectedAccountShippingAddressId parameter for this parameters group.
     *
     * @param int $selectedAccountShippingAddressId
     *
     * @return void
     */
    public function setSelectedAccountShippingAddressId(int $selectedAccountShippingAddressId): void {
        $this->selectedAccountShippingAddressId = $selectedAccountShippingAddressId;
    }

    protected function getValidator(): UpdateOmsBasketCustomerParametersValidator {
        return new UpdateOmsBasketCustomerParametersValidator();
    }
}
