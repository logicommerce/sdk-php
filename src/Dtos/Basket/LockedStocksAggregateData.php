<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Resources\Date;

/**
 * This is the LockedStocksAggregateData class.
 * The LockedStocksAggregateData information will be stored in that class and will remain immutable (only get methods are available)
 * 
 * @see LockedStocksAggregateData::getProductId()
 * @see LockedStocksAggregateData::getMyLockedStockUnits()
 * @see LockedStocksAggregateData::getOthersLockedStockUnits()
 * @see LockedStocksAggregateData::getOthersNearestLockedStockToExpireUnits()
 * @see LockedStocksAggregateData::getOthersNearestLockedStockToExpireTime()
 * @see LockedStocksAggregateData::getProductCombinationId()
 *
 * @see Element
 * 
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class LockedStocksAggregateData extends Element {
    use ElementTrait;

    protected int $productId = 0;

    protected int $myLockedStockUnits = 0;

    protected int $othersLockedStockUnits = 0;

    protected int $othersNearestLockedStockToExpireUnits = 0;

    protected ?Date $othersNearestLockedStockToExpireTime = null;

    protected int $productCombinationId = 0;

    /**
     * Internal identifier of the product to wich the product combination belongs.
     *
     * @return int
     */
    public function getProductId(): int {
        return $this->productId;
    }

    /**
     * Specifies the total LockedStock units for this product combination in the session's basket. 
     *
     * @return int
     */
    public function getMyLockedStockUnits(): int {
        return $this->myLockedStockUnits;
    }

    /**
     * Specifies the total locked stock units by other sessions, for this product combination and belonging to the warehouses that are accessible by the current session.
     *
     * @return int
     */
    public function getOthersLockedStockUnits(): int {
        return $this->othersLockedStockUnits;
    }

    /**
     * Specifies the quantity of the nearest to expire locked stock between the ones of the other sessions, for this product combination and belonging to the warehouses that are accessible by the current session. 
     *
     * @return int
     */
    public function getOthersNearestLockedStockToExpireUnits(): int {
        return $this->othersNearestLockedStockToExpireUnits;
    }

    /**
     * Specifies when expires the nearest to expire locked stock between the ones of the other sessions, for this product combination and belonging to the warehouses that are accessible by the current session. 
     *
     * @return Date|NULL
     */
    public function getOthersNearestLockedStockToExpireTime(): ?Date {
        return $this->othersNearestLockedStockToExpireTime;
    }

    protected function setOthersNearestLockedStockToExpireTime(string $othersNearestLockedStockToExpireTime): void {
        $this->othersNearestLockedStockToExpireTime = Date::create($othersNearestLockedStockToExpireTime);
    }

    /**
     * Internal identifier of the product combination.
     *
     * @return int
     */
    public function getProductCombinationId(): int {
        return $this->productCombinationId;
    }
}
