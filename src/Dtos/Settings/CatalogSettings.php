<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the catalog settings class.
 * The catalog settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CatalogSettings::getShowStock()
 * @see CatalogSettings::getShowPrice()
 * @see CatalogSettings::getShowOfferPrice()
 * @see CatalogSettings::getShowTaxesIncluded()
 * @see CatalogSettings::getAvailabilityId()
 * @see CatalogSettings::getShowOptionImages()
 * @see CatalogSettings::getProductComparisonActive()
 * @see CatalogSettings::getProductComparisonMax()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class CatalogSettings extends Element {
    use ElementTrait;

    protected bool $showStock = false;

    protected bool $showPrice = false;

    protected bool $showOfferPrice = false;

    protected bool $showTaxesIncluded = false;

    protected ?int $availabilityId = null;

    protected bool $showOptionImages = false;

    protected bool $productComparisonActive = false;

    protected int $productComparisonMax = 0;

    /**
     * Returns the catalog settings showStock.
     *
     * @return bool
     */
    public function getShowStock(): bool {
        return $this->showStock;
    }

    /**
     * Returns the catalog settings showPrice.
     *
     * @return bool
     */
    public function getShowPrice(): bool {
        return $this->showPrice;
    }

    /**
     * Returns the catalog settings showOfferPrice.
     *
     * @return bool
     */
    public function getShowOfferPrice(): bool {
        return $this->showOfferPrice;
    }

    /**
     * Returns the catalog settings showTaxesIncluded.
     *
     * @return bool
     * @deprecated
     */
    public function getShowTaxesIncluded(): bool {
        return $this->showTaxesIncluded;
    }

    /**
     * Returns the catalog settings availabilityId.
     *
     * @return int|NULL
     */
    public function getAvailabilityId(): ?int {
        return $this->availabilityId;
    }

    /**
     * Returns the catalog settings showOptionImages.
     *
     * @return bool
     */
    public function getShowOptionImages(): bool {
        return $this->showOptionImages;
    }

    /**
     * Returns the catalog settings productComparisonActive. Specifies whether ProductComparison is enabled.
     *
     * @return bool
     */
    public function getProductComparisonActive(): bool {
        return $this->productComparisonActive;
    }

    /**
     * Returns the catalog settings productComparisonMax. Specifies the configured maximum quantity of products that can be added to productComparison.
     *
     * @return int
     */
    public function getProductComparisonMax(): int {
        return $this->productComparisonMax;
    }
}
