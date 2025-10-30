<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Media class.
 * The Media information of API elements will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Media::getSmallImage()
 * @see Media::getMediumImage()
 * @see Media::getLargeImage()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog
 */
class Media {
    use ElementTrait;

    protected string $smallImage = '';

    protected string $mediumImage = '';

    protected string $largeImage = '';

    /**
     * Returns the element small image.
     *
     * @return string
     */
    public function getSmallImage(): string {
        return $this->smallImage;
    }

    /**
     * Returns the element medium image.
     *
     * @return string
     */
    public function getMediumImage(): string {
        return $this->mediumImage;
    }

    /**
     * Returns the element large image.
     *
     * @return string
     */
    public function getLargeImage(): string {
        return $this->largeImage;
    }
}
