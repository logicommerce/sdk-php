<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Resources\Date;

/**
 * This is the basket base ClosurePeriod class.
 * The base ClosurePeriod information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ClosurePeriod::getStartDate()
 * @see ClosurePeriod::getEndDate()
 *
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class ClosurePeriod {
    use ElementTrait;

    protected ?Date $startDate = null;

    protected ?Date $endDate = null;

    /**
     * Returns the startDate
     *
     * @return null|Date
     */
    public function getStartDate(): ?Date {
        return $this->startDate;
    }

    protected function setStartDate(string $startDate) {
        $this->startDate = Date::create($startDate);
    }

    /**
     * Returns endDate
     *
     * @return null|Date
     */
    public function getEndDate(): ?Date {
        return $this->endDate;
    }

    protected function setEndDate(string $endDate) {
        $this->endDate = Date::create($endDate);
    }
}
