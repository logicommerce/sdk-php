<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the basket base OpeningTimes class.
 * The base OpeningTimes information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see OpeningTimes::getMonday()
 * @see OpeningTimes::getTuesday()
 * @see OpeningTimes::getWednesday()
 * @see OpeningTimes::getThursday()
 * @see OpeningTimes::getFriday()
 * @see OpeningTimes::getSaturday()
 * @see OpeningTimes::getSunday()
 *
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class OpeningTimes {
    use ElementTrait;

    protected array $monday = [];

    protected array $tuesday = [];

    protected array $wednesday = [];

    protected array $thursday = [];

    protected array $friday = [];

    protected array $saturday = [];

    protected array $sunday = [];

    /**
     * Returns monday
     *
     * @return array
     */
    public function getMonday(): array {
        return $this->monday;
    }

    protected function setMonday(array $monday): void {
        $this->monday = $this->setArrayField($monday, OpeningTime::class);
    }

    /**
     * Returns tuesday
     *
     * @return array
     */
    public function getTuesday(): array {
        return $this->tuesday;
    }

    protected function setTuesday(array $tuesday): void {
        $this->tuesday = $this->setArrayField($tuesday, OpeningTime::class);
    }

    /**
     * Returns wednesday
     *
     * @return array
     */
    public function getWednesday(): array {
        return $this->wednesday;
    }

    protected function setWednesday(array $wednesday): void {
        $this->wednesday = $this->setArrayField($wednesday, OpeningTime::class);
    }

    /**
     * Returns thursday
     *
     * @return array
     */
    public function getThursday(): array {
        return $this->thursday;
    }

    protected function setThursday(array $thursday): void {
        $this->thursday = $this->setArrayField($thursday, OpeningTime::class);
    }

    /**
     * Returns friday
     *
     * @return array
     */
    public function getFriday(): array {
        return $this->friday;
    }

    protected function setFriday(array $friday): void {
        $this->friday = $this->setArrayField($friday, OpeningTime::class);
    }

    /**
     * Returns saturday
     *
     * @return array
     */
    public function getSaturday(): array {
        return $this->saturday;
    }

    protected function setSaturday(array $saturday): void {
        $this->saturday = $this->setArrayField($saturday, OpeningTime::class);
    }

    /**
     * Returns sunday
     *
     * @return array
     */
    public function getSunday(): array {
        return $this->sunday;
    }

    protected function setSunday(array $sunday): void {
        $this->sunday = $this->setArrayField($sunday, OpeningTime::class);
    }
}
