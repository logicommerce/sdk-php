<?php

namespace SDK\Core\Dtos\Traits;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Core\Resources\Date;
use SDK\Enums\AccountRegisteredUserStatus;

/**
 * This is the simple account registered user trait.
 * This trait will be used by simple account registered users.
 *
 * @package SDK\Core\Dtos\Traits
 */
trait SimpleAccountRegisteredUserTrait {
    use EnumResolverTrait, BaseAccountRegisteredUserTrait;

    protected string $defaultCurrencyCode = '';

    protected string $defaultLanguageCode = '';

    protected bool $useShippingAddress = false;

    protected ?Date $lastVisit = null;

    protected string $status = '';

    /**
     * Returns if the account uses the shipping address.
     * 
     * @return bool
     */
    public function isUseShippingAddress(): bool {
        return $this->useShippingAddress;
    }

    /**
     * Returns the default currency code.
     * 
     * @return string
     */
    public function getDefaultCurrencyCode(): string {
        return $this->defaultCurrencyCode;
    }

    /**
     * Returns the default language code.
     * 
     * @return string
     */
    public function getDefaultLanguageCode(): string {
        return $this->defaultLanguageCode;
    }

    /**
     * Returns the last visit date.
     * 
     * @return Date|null
     */
    public function getLastVisit(): ?Date {
        return $this->lastVisit;
    }

    protected function setLastVisit(string $lastVisit): void {
        $this->lastVisit = Date::create($lastVisit);
    }

    /**
     * Returns the status
     *
     * @return string
     */
    public function getStatus(): string { // ENUM
        return $this->getEnum(AccountRegisteredUserStatus::class, $this->status, AccountRegisteredUserStatus::DISABLED);
    }
}
