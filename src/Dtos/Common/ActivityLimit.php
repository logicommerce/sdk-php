<?php

namespace SDK\Dtos\Common;

use SDK\Core\Resources\Date;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Activity Limit class.
 * The Activity Limits information of API elements will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ActivityLimit::getActivationDate()
 * @see ActivityLimit::getExpirationDate()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class ActivityLimit {
    use ElementTrait;

    protected ?Date $activationDate = null;

    protected ?Date $expirationDate = null;

    /**
     * Returns the activity limit activation date.
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
     * Returns the activity limit expiration date.
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
