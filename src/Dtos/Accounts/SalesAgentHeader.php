<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * Represents a sales agent header.
 * The asales agent header will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see salesAgentHeader::getActive()
 * @see salesAgentHeader::getPercentCommission()
 * @see salesAgentHeader::getRegisteredUser()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\Accounts
 */
class SalesAgentHeader extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected bool $active = false;

    protected float $percentCommission = 0.00;

    protected ?RegisteredUserHeader $registeredUser = null;

    /**
     * Returns the sales agent active.
     *
     * @return bool
     */
    public function getActive(): bool {
        return $this->active;
    }

    /**
     * Returns the sales agent percent commission.
     *
     * @return float
     */
    public function getPercentCommission(): float {
        return $this->percentCommission;
    }

    /**
     * Returns the registered user.
     * 
     * @return RegisteredUserHeader
     */
    public function getRegisteredUser(): ?RegisteredUserHeader {
        return $this->registeredUser;
    }

    protected function setRegisteredUser(array $registeredUser): void {
        $this->registeredUser = new RegisteredUserHeader($registeredUser);
    }
}
