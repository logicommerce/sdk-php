<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Groups\Traits;

use SDK\Core\Resources\Date;

/**
 * This is the fromt/to date parameters group trait.
 *
 * @package SDK\Core\Services\Parameters\Groups\Traits
 */
trait FromToDateParametersGroupTrait {

    protected string $fromDate;

    protected string $toDate;

    /**
     * Sets a start date for this parameters group.
     *
     * @param \DateTime $date
     *
     * @return void
     */
    public function setFromDate(\DateTime $fromDate): void {
        $this->fromDate = $fromDate->format(Date::DATETIME_FORMAT);
    }

    /**
     * Sets a end date for this parameters group.
     *
     * @param \DateTime $date
     *
     * @return void
     */
    public function setToDate(\DateTime $toDate): void {
        $this->toDate = $toDate->format(Date::DATETIME_FORMAT);
    }
    
}
