<?php

namespace SDK\Core\Dtos\Traits;

use SDK\Core\Resources\Date;

/**
 * This is the base account registered user trait.
 * This trait will be used by account registered users.
 *
 * @package SDK\Core\Dtos\Traits
 */
trait BaseAccountRegisteredUserTrait {
    use DateAddedTrait;

    protected bool $master = false;

    protected string $accountAlias = '';

    protected ?Date $lastUsed = null;

    /**
     * Returns if the account is the master account.
     * 
     * @return bool
     */
    public function isMaster(): bool {
        return $this->master;
    }

    protected function setMaster(bool $master): void {
        $this->master = $master;
    }

    /**
     * Returns the account alias.
     * 
     * @return string
     */
    public function getAccountAlias(): string {
        return $this->accountAlias;
    }

    protected function setAccountAlias(string $accountAlias): void {
        $this->accountAlias = $accountAlias;
    }

    /**
     * Returns the date when the account was last used.
     * 
     * @return Date|NULL
     */
    public function getLastUsed(): ?Date {
        return $this->lastUsed;
    }

    protected function setLastUsed(string $lastUsed): void {
        $this->lastUsed = Date::create($lastUsed);
    }
}
