<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the basket base OpeningTime class.
 * The base OpeningTime information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see OpeningTime::getStartTime()
 * @see OpeningTime::getEndTime()
 *
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class OpeningTime {
    use ElementTrait;

    protected string $startTime = '';

    protected string $endTime = '';

    /**
     * Returns the startTime
     *
     * @return string
     */
    public function getStartTime(): string {
        return $this->startTime;
    }

    /**
     * Returns endTime
     *
     * @return string
     */
    public function getEndTime(): string {
        return $this->endTime;
    }
}
