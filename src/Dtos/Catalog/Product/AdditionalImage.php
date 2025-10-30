<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Product additional image class.
 * The additional images of API products will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AdditionalImage::getPriority()
 * @see AdditionalImage::getSmallImage()
 * @see AdditionalImage::getLargeImage()
 * @see AdditionalImage::getAlt()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class AdditionalImage {
    use ElementTrait;

    protected int $priority = 0;

    protected string $smallImage = '';

    protected string $largeImage = '';

    protected string $alt = '';

    /**
     * Returns the additional priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the additional small image.
     *
     * @return string
     */
    public function getSmallImage(): string {
        return $this->smallImage;
    }

    /**
     * Returns the additional large image.
     *
     * @return string
     */
    public function getLargeImage(): string {
        return $this->largeImage;
    }

    /**
     * Returns the additional alternative text.
     *
     * @return string
     */
    public function getAlt(): string {
        return $this->alt;
    }
}
