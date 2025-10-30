<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\OpeningTimesParametersValidator;

/**
 * This is the location parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class OpeningTimesParametersGroup extends ParametersGroup {

    protected array $monday;
    protected array $tuesday;
    protected array $wednesday;
    protected array $thursday;
    protected array $friday;
    protected array $saturday;
    protected array $sunday;


    /**
     * Sets the monday parameter for this parameters group.
     *
     * @param array OpeningTimeParametersGroup $monday
     *
     * @return void
     */
    public function setMonday(array $monday): void {
        $this->monday = $monday;
    }


    /**
     * Sets the tuesday parameter for this parameters group.
     *
     * @param array OpeningTimeParametersGroup $tuesday
     *
     * @return void
     */
    public function setTuesday(array $tuesday): void {
        $this->tuesday = $tuesday;
    }


    /**
     * Sets the wednesday parameter for this parameters group.
     *
     * @param array OpeningTimeParametersGroup $wednesday
     *
     * @return void
     */
    public function setWednesday(array $wednesday): void {
        $this->wednesday = $wednesday;
    }


    /**
     * Sets the thursday parameter for this parameters group.
     *
     * @param array OpeningTimeParametersGroup $thursday
     *
     * @return void
     */
    public function setThursday(array $thursday): void {
        $this->thursday = $thursday;
    }


    /**
     * Sets the friday parameter for this parameters group.
     *
     * @param array OpeningTimeParametersGroup $friday
     *
     * @return void
     */
    public function setFriday(array $friday): void {
        $this->friday = $friday;
    }


    /**
     * Sets the saturday parameter for this parameters group.
     *
     * @param array OpeningTimeParametersGroup $saturday
     *
     * @return void
     */
    public function setSaturday(array $saturday): void {
        $this->saturday = $saturday;
    }


    /**
     * Sets the sunday parameter for this parameters group.
     *
     * @param array OpeningTimeParametersGroup $sunday
     *
     * @return void
     */
    public function setSunday(array $sunday): void {
        $this->sunday = $sunday;
    }




    protected function getValidator(): OpeningTimesParametersValidator {
        return new OpeningTimesParametersValidator();
    }
}
