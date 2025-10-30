<?php

namespace SDK\Dtos\Common\DiscountConditions;

use SDK\Core\Dtos\BaseDiscountCondition;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Resources\Date;

/**
 * This is the DiscountConditionActivityLimit class.
 *
 * @see DiscountConditionActivityLimit::getMet()
 * @see DiscountConditionActivityLimit::getActivationDate()
 * @see DiscountConditionActivityLimit::getExpirationDate()
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class DiscountConditionActivityLimit extends BaseDiscountCondition {
    use ElementTrait;

    protected ?bool $met = null;

    protected ?Date $activationDate = null;

    protected ?Date $expirationDate = null;

    /**
     * Specifies if the condition is met. Null means that the condition can not be evaluated.
     *
     * @return bool|NULL
     */
    public function getMet(): ?bool {
        return $this->met;
    }

    /**
     * Returns the specifies the activation date of the activity limit condition. 
     *
     * @return Date|NULL
     */
    public function getActivationDate(): ?Date {
        return $this->activationDate;
    }

    protected function setActivationDate(string $activationDate): void {
        $this->activationDate = Date::create($activationDate);
    }

    /**
     * Returns the specifies the expiration date of the activity limit condition.
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
