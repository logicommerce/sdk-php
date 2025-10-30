<?php

namespace SDK\Dtos\User;

use Deprecated;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the SalesAgentHeader temporally class for a deprecated resource
 *
 * @see SalesAgentHeaderToRemove::getActive()
 * @see SalesAgentHeaderToRemove::getPercentCommission()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\User
 */
#[Deprecated('This class is deprecated and must be replaced by future SalesAgentHeader')]
class SalesAgentHeaderToRemove {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected bool $active = false;

    protected float $percentCommission = 0.0;

    protected ?SalesAgentRegisteredToRemove $registeredUser = null;


    /**
     * Returns if this sales agent is active or not.
     *
     * @return bool
     */
    public function getActive(): bool {
        return $this->active;
    }

    protected function setActive(bool $active): void {
        $this->active = $active;
    }

    /**
     * Returns the percent commission of this sales agent.
     *
     * @return float
     */
    public function getPercentCommission(): float {
        return $this->percentCommission;
    }

    protected function setPercentCommission(float $percentCommission): void {
        $this->percentCommission = $percentCommission;
    }

    /**
     * Returns the name of the sales agent.
     *
     * @return string
     */
    public function getName(): string {
        if ($this->registeredUser === null) {
            return '';
        }
        $lastName = trim((string) $this->registeredUser->getLastName());
        $firstName = trim((string) $this->registeredUser->getFirstName());
        if ($lastName !== '' && $firstName !== '') {
            return "{$lastName}, {$firstName}";
        }
        return $lastName !== '' ? $lastName : $firstName;
    }

    public function getRegisteredUser(): ?SalesAgentRegisteredToRemove {
        return $this->registeredUser;
    }

    protected function setRegisteredUser(array $registeredUser): void {
        $this->registeredUser = new SalesAgentRegisteredToRemove($registeredUser);
    }

}
