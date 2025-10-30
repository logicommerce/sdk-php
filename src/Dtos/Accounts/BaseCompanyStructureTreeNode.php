<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\AccountStatus;
use SDK\Enums\AccountType;

/** 
 * BaseCompanyStructureTreeNode class.
 * 
 * 
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see EnumResolverTrait
 * 
 * @package SDK\Dtos\Accounts
 */

abstract class BaseCompanyStructureTreeNode extends Element {
    use IdentifiableElementTrait, IntegrableElementTrait, EnumResolverTrait;

    use ElementTrait {
        __construct as superConstruct;
    }

    protected string $type = '';
    protected string $image = '';
    protected ?RegisteredUserHeader $master = null;
    protected string $status = '';
    protected ?AccountAddressHeaderReduced $invoicingAddress = null;
    protected string $alias = '';
    protected string $name = '';
    protected bool $hasSubCompanyDivisionsToLoad = false;

    /**
     * Returns the type of the account.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(AccountType::class, $this->type, AccountType::COMPANY);
    }

    /**
     * Returns the type of the account.
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
     * Returns the registered user.
     * 
     * @return RegisteredUserHeader
     */
    public function getMaster(): ?RegisteredUserHeader {
        return $this->master;
    }

    protected function setMaster(array $master): void {
        $this->master = new RegisteredUserHeader($master);
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
     * Returns the invoicing address.
     * 
     * @return AccountAddressHeaderReduced
     */
    public function getInvoicingAddress(): ?AccountAddressHeaderReduced {
        return $this->invoicingAddress;
    }

    protected function setInvoicingAddress(array $invoicingAddress): void {
        $this->invoicingAddress = new AccountAddressHeaderReduced($invoicingAddress);
    }

    /**
     * Returns the alias
     *
     * @return string
     */
    public function getAlias(): string {
        return $this->alias;
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the has sub company divisions to load.
     * 
     * @return bool
     */
    abstract public function getHasSubCompanyDivisionsToLoad(): bool;
}
