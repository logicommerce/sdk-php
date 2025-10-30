<?php

namespace SDK\Core\Dtos\Catalog;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Resources\Date;

/**
 * This is the Current Data Stock class.
 * The API Current Data Stock data will be stored in that class and will remain immutable (only get methods are prevision)
 *
 * @see CombinationDataStock::getUnits()
 * @see CombinationDataStock::getPrevisionDate()
 * @see CombinationDataStock::getAvailabilityId()
 *
 * @uses ElementTrait
 * 
 * @package SDK\Core\Dtos
 */
class CombinationDataStock {
    use ElementTrait;

    protected int $combinationId = 0;

    protected int $units = 0;

    protected ?Date $previsionDate = null;

    protected int $availabilityId = 0;

    protected array $warehouseIds = [];

    protected int $offsetDays = 0;

    /**
     * Returns the combinationId.
     *
     * @return int
     */
    public function getCombinationId(): int {
        return $this->combinationId;
    }


    /**
     * Returns the units.
     *
     * @return int
     */
    public function getUnits(): int {
        return $this->units;
    }

    /**
     * Returns the projected date of arrival of the product.
     *
     * @return Date|NULL
     */
    public function getPrevisionDate(): ?Date {
        return $this->previsionDate;
    }

    protected function setPrevisionDate(string $previsionDate): void {
        $this->previsionDate = Date::create($previsionDate);
    }

    /**
     * Returns the internal identifier of the product assigned availability.
     *
     * @return int
     */
    public function getAvailabilityId(): int {
        return $this->availabilityId;
    }

    /**
     * Returns the warehouseIds.
     *
     * @return array
     */
    public function getWarehouseIds(): array {
        return $this->warehouseIds;
    }

    /**
     * Returns the offsetDays.
     *
     * @return int
     */
    public function getOffsetDays(): int {
        return $this->offsetDays;
    }

}
