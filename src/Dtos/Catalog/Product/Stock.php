<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Stock class.
 * The stock of API products will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Stock::getUnits()
 * @see Stock::getWarehouseId()
 * @see Stock::getWarehouseGroupId()
 * @see Stock::getPriority()
 * @see Stock::getOffsetDays()
 * @see Stock::getPrevisionList()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class Stock {
    use ElementTrait;

    protected int $units = 0;

    protected int $warehouseId = 0;

    protected int $warehouseGroupId = 0;

    protected int $priority = 0;

    protected int $offsetDays = 0;

    protected array $previsions = [];

    /**
     * Returns the total units on this stock object.
     *
     * @return int
     */
    public function getUnits(): int {
        return $this->units;
    }

    /**
     * Returns the warehouse id where this stock belongs.
     *
     * @return int
     */
    public function getWarehouseId(): int {
        return $this->warehouseId;
    }

    /**
     * Returns the group identifier where the warehouse of this stock belongs.
     *
     * @return int
     */
    public function getWarehouseGroupId(): int {
        return $this->warehouseGroupId;
    }

    /**
     * Returns the stock consumption priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the total number of days a stock could take to be served.
     *
     * @return int
     */
    public function getOffsetDays(): int {
        return $this->offsetDays;
    }

    /**
     * Returns a collection of previsions on this stock object.
     *
     * @see Prevision
     * @return Prevision[]
     */
    public function getPrevisions(): array {
        return $this->previsions;
    }

    protected function setPrevisions(array $previsions): void {
        $this->previsions = $this->setArrayField($previsions, Prevision::class);
    }
}
