<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Resources\Date;
use SDK\Core\Dtos\Traits\DateAddedTrait;

/**
 * This is the registered user simple profile main class.
 * The registered user simple profile information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see RegisteredUserSimpleProfile::getBirthday()
 * @see RegisteredUserSimpleProfile::getLastUsed()
 * @see RegisteredUserSimpleProfile::getImage()
 * @see RegisteredUserSimpleProfile::isSalesAgent()
 * @see RegisteredUserSimpleProfile::getSalesAgentId()
 * @see RegisteredUserSimpleProfile::isBlogger()
 * @see RegisteredUserSimpleProfile::isSupplier()
 *
 * @see RegisteredUserHeader
 * @see DateAddedTrait
 * @see Date
 *
 * @package SDK\Dtos\Accounts
 */
class RegisteredUserSimpleProfile extends RegisteredUserHeader {
    use DateAddedTrait;

    protected ?Date $birthday = null;
    protected ?Date $lastUsed = null;
    protected string $image = '';
    protected bool $salesAgent = false;
    protected int $salesAgentId = 0;
    protected bool $blogger = false;
    protected bool $supplier = false;

    /**
     * Returns the birthday of the registered user.
     *
     * @return Date|null
     */
    public function getBirthday(): ?Date {
        return $this->birthday;
    }

    protected function setBirthday(string $birthday): void {
        $this->birthday = Date::create($birthday);
    }

    /**
     * Returns the last used date of the registered user.
     *
     * @return Date|null
     */
    public function getLastUsed(): ?Date {
        return $this->lastUsed;
    }

    protected function setLastUsed(string $lastUsed): void {
        $this->lastUsed = Date::create($lastUsed);
    }

    /**
     * Returns the image of the registered user.
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * Returns if the registered user is a sales agent.
     *
     * @return bool
     */
    public function isSalesAgent(): bool {
        return $this->salesAgent;
    }

    /**
     * Returns the sales agent ID of the registered user.
     *
     * @return int
     */
    public function getSalesAgentId(): int {
        return $this->salesAgentId;
    }

    /**
     * Returns if the registered user is a blogger.
     *
     * @return bool
     */
    public function isBlogger(): bool {
        return $this->blogger;
    }

    /**
     * Returns if the registered user is a supplier.
     *
     * @return bool
     */
    public function isSupplier(): bool {
        return $this->supplier;
    }
}
