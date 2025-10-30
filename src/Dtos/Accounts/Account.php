<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Resources\Date;
use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Factories\MasterFactory;
use SDK\Core\Dtos\Traits\CustomTagValuesTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Dtos\Traits\DateAddedTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\AccountStatus;
use SDK\Enums\AccountType;
use SDK\Enums\UserType;

/**
 * Account class.
 * 
 * @see Element
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see DateAddedTrait
 * @see CustomTagValuesTrait
 * @see EnumResolverTrait
 * 
 * @see Account::getType()
 * @see Account::getLastUsed()
 * @see Account::getImage()
 * @see Account::getStatus()
 * @see Account::getMaster()
 * @see Account::getGroup()
 * @see Account::getInvoicingAddresses()
 * 
 * @package SDK\Dtos\Accounts
 */
abstract class Account extends Element {
    use ElementTrait,
        IdentifiableElementTrait,
        IntegrableElementTrait,
        DateAddedTrait,
        CustomTagValuesTrait,
        EnumResolverTrait;

    protected string $type = '';

    protected ?Date $lastUsed = null;

    protected string $image = '';

    protected string $status = '';

    protected ?Master $master = null;

    protected ?AccountGroup $group = null;

    protected array $invoicingAddresses = [];

    protected array $shippingAddresses = [];

    protected string $uniqueId = '';

    protected string $alias = '';

    protected string $name = '';

    protected array $salesAgents = [];

    /**
     * Returns the type of the account.
     *
     * @return AccountType
     */
    public function getType(): string {
        return $this->getEnum(AccountType::class, $this->type, AccountType::GENERAL);
    }

    public function getUserType(): string {
        return UserType::getEnum($this->type, UserType::EMPTY);
    }
    /**
     * Returns the last used date.
     *
     * @return Date
     */
    public function getLastUsed(): ?Date {
        return $this->lastUsed;
    }

    protected function setLastUsed(string $lastUsed): void {
        $this->lastUsed = Date::create($lastUsed);
    }

    /**
     * Returns the image of the account.
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    protected function setImage(string $image): void {
        $this->image = $image;
    }

    /**
     * Returns the status
     *
     * @return string
     */
    public function getStatus(): string { // ENUM
        return $this->getEnum(AccountStatus::class, $this->status, AccountStatus::DISABLED);
    }

    /**
     * Returns the master of the account.
     *
     * @return Master
     */
    public function getMaster(): ?Master {
        return $this->master;
    }

    protected function setMaster(array $master): void {
        $this->master = MasterFactory::getElement($master);
    }

    /**
     * Returns the group of the account.
     *
     * @return AccountGroup
     */
    public function getGroup(): ?AccountGroup {
        return $this->group;
    }

    protected function setGroup(array $group): void {
        $this->group = new AccountGroup($group);
    }

    /**
     * Returns the invoicing addresses of the account.
     *
     * @return AccountInvoicingAddress[]
     */
    public function getInvoicingAddresses(): array {
        return $this->invoicingAddresses;
    }

    protected function setInvoicingAddresses(array $invoicingAddresses): void {
        $this->invoicingAddresses = $this->setArrayField($invoicingAddresses, AccountInvoicingAddress::class);
    }

    /**
     * Returns the shipping addresses of the account.
     *
     * @return AccountShippingAddress[]
     */
    public function getShippingAddresses(): array {
        return $this->shippingAddresses;
    }

    protected function setShippingAddresses(array $shippingAddresses): void {
        $this->shippingAddresses = $this->setArrayField($shippingAddresses, AccountShippingAddress::class);
    }

    /**
     * Returns the unique ID of the account.
     *
     * @return string
     */
    public function getUniqueId(): string {
        return $this->uniqueId;
    }

    protected function setUniqueId(string $uniqueId): void {
        $this->uniqueId = $uniqueId;
    }

    /**
     * Returns the alias of the account.
     *
     * @return string
     */
    public function getAlias(): string {
        return $this->alias;
    }

    /**
     * Returns the name of the account.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the sales agents of the account.
     *
     * @return SalesAgentHeader[]
     */
    public function getSalesAgents(): array {
        return $this->salesAgents;
    }

    protected function setSalesAgents(array $salesAgents): void {
        $this->salesAgents = $this->setArrayField($salesAgents, SalesAgentHeader::class);
    }
}
