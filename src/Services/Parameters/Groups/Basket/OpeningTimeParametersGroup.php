<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\OpeningTimeParametersValidator;

/**
 * This is the location parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class OpeningTimeParametersGroup extends ParametersGroup {

    protected string $startTime;

    protected string $endTime;

    /**
     * Sets the startTime
     *
     * @param string $startTime
     *
     * @return void
     */
    public function setStartTime(string $startTime): void {
        $this->startTime = $startTime;
    }

    /**
     * Sets the endTime
     *
     * @param string $endTime
     *
     * @return void
     */
    public function setEndTime(string $endTime): void {
        $this->endTime = $endTime;
    }

    protected function getValidator(): OpeningTimeParametersValidator {
        return new OpeningTimeParametersValidator();
    }
}
