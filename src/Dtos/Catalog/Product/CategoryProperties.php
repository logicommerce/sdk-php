<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Category Properties class.
 * The language information of API categories will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CategoryProperties::getPercentPrice()
 * @see CategoryProperties::getFareId()
 * @see CategoryProperties::getPercentPriceOverrideCustomPrices()
 * @see CategoryProperties::getUseRetailPrice()
 * @see CategoryProperties::getDefinitionId()
 * @see CategoryProperties::getShowBasePrice()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class CategoryProperties {
    use ElementTrait;

    protected float $percentPrice = 0.0;

    protected int $fareId = 0;

    protected bool $percentPriceOverrideCustomPrices = false;

    protected bool $useRetailPrice = false;

    protected int $definitionId = 0;

    protected bool $showBasePrice = false;

    /**
     * Returns the category properties percent price.
     *
     * @return float
     */
    public function getPercentPrice(): float {
        return $this->percentPrice;
    }

    /**
     * Returns the identifier of the category properties fare.
     *
     * @return int
     */
    public function getFareId(): int {
        return $this->fareId;
    }

    /**
     * Sets if the category properties percent price has to override the custom prices or not.
     *
     * @return bool
     */
    public function getPercentPriceOverrideCustomPrices(): bool {
        return $this->percentPriceOverrideCustomPrices;
    }

    /**
     * Sets if the category properties will use the retail prices or not.
     *
     * @return bool
     */
    public function getUseRetailPrice(): bool {
        return $this->useRetailPrice;
    }

    /**
     * Returns the identifier of the category properties definition.
     *
     * @return int
     */
    public function getDefinitionId(): int {
        return $this->definitionId;
    }

    /**
     * Sets if the category is supposed to show the base prices or not.
     *
     * @return bool
     */
    public function getShowBasePrice(): bool {
        return $this->showBasePrice;
    }
}
