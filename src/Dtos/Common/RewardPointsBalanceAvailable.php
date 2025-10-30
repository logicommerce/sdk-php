<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Resources\Date;

/**
 * This is the reward points balance available class.
 * The API reward points rule will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RewardPointsBalanceAvailable::getValue()
 * @see RewardPointsBalanceAvailable::getExpirationDate()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class RewardPointsBalanceAvailable extends Element {
    use ElementTrait;

    protected float $value = 0;

    protected ?Date $expirationDate = null;

    /**
     * Returns the value
     *
     * @return float
     */
    public function getValue(): float {
        return $this->value;
    }

    /**
     * Returns the expiration Date value.
     *
     * @return Date|NULL
     */
    public function getExpirationDate(): ?Date {
        return $this->expirationDate;
    }

    protected function setExpirationDate(string $expirationDate): void {
        $this->expirationDate = Date::create($expirationDate);
    }

}
