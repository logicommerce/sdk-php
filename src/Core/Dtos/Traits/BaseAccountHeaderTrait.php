<?php

namespace SDK\Core\Dtos\Traits;

use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Accounts\RegisteredUserHeader;
use SDK\Enums\AccountStatus;
use SDK\Enums\AccountType;

/*
 * AccountHeader class.
 * 
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see EnumResolverTrait
 * 
 */

trait BaseAccountHeaderTrait {
    use IdentifiableElementTrait, IntegrableElementTrait, EnumResolverTrait;

    protected string $type = '';
    protected string $image = '';
    protected ?RegisteredUserHeader $master = null;
    protected string $status = '';
    protected string $alias = '';
    protected string $name = '';

    /**
     * Returns the type of the account.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(AccountType::class, $this->type, AccountType::GENERAL);
    }

    /**
     * Returns the image of the account.
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * Returns the master of the account.
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
}
