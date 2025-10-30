<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\CatalogStockPolicy;
use SDK\Enums\ShipmentsByDate;
use SDK\Enums\StockSystem;

/**
 * This is the stock settings class.
 * The stock settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see StockSettings::getStockManagementEnabled()
 * @see StockSettings::getStockSystem()
 * @see StockSettings::getCatalogStockPolicy()
 * @see StockSettings::areReservationsAllowed()
 * @see StockSettings::useStockPrevisionOnReservePrevision()
 * @see StockSettings::getAllowReservations()
 * @see StockSettings::getUseStockPrevisionOnReservePrevision()
 * @see StockSettings::getOnlyInStock()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class StockSettings extends Element {
    use ElementTrait, EnumResolverTrait;

    protected bool $stockManagement = false;

    protected string $stockSystem = '';

    protected string $catalogStockPolicy = '';

    protected bool $allowReservations = false;

    protected bool $allowMultiexpedition = false;

    protected bool $useStockPrevisionOnReservePrevision = false;

    protected string $shipmentsByDate = '';

    protected bool $onlyInStock = false;

    /**
     * Returns if the stock management is enabled or not.
     *
     * @return bool
     */
    public function getStockManagement(): bool {
        return $this->stockManagement;
    }

    /**
     * Returns the stock system.
     *
     * @return string
     */
    public function getStockSystem(): string { // ENUM
        return $this->getEnum(StockSystem::class, $this->stockSystem, StockSystem::UNITS);
    }

    /**
     * Returns the stock settings catalogs tock policy.
     *
     * @return string
     */
    public function getCatalogStockPolicy(): string { // ENUM
        return $this->getEnum(CatalogStockPolicy::class, $this->catalogStockPolicy, CatalogStockPolicy::BY_ASSIGNED_WAREHOUSES);
    }

    /**
     * Returns if the website allows reservations or not.
     *
     * @return bool
     */
    public function getAllowReservations(): bool {
        return $this->allowReservations;
    }

    /**
     * Returns if the website allows multiexpedition or not.
     *
     * @return bool
     */
    public function getAllowMultiexpedition(): bool {
        return $this->allowMultiexpedition;
    }

    /**
     * Returns the stock settings useStockPrevisionOnReservePrevision.
     *
     * @return bool
     */
    public function getUseStockPrevisionOnReservePrevision(): bool {
        return $this->useStockPrevisionOnReservePrevision;
    }

    /**
     * Returns the shipments by date setting.
     *
     * @return string
     */
    public function getShipmentsByDate(): string { // ENUM
        return $this->getEnum(ShipmentsByDate::class, $this->shipmentsByDate, ShipmentsByDate::NEVER);
    }

    /**
     * Returns the stock settings onlyInStock.
     *
     * @return bool
     */
    public function getOnlyInStock(): bool {
        return $this->onlyInStock;
    }
}
