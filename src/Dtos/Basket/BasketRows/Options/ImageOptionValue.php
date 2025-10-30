<?php

namespace SDK\Dtos\Basket\BasketRows\Options;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Catalog\Media;

/**
 * This is the basket product option image value class.
 *
 * @see ImageOptionValue::getImages()
 *
 * @see ElementTrait
 * @see OptionValue
 *
 * @package SDK\Dtos\Basket\BasketRows\Options
 */
class ImageOptionValue extends OptionValue {
    use ElementTrait;

    protected ?Media $images = null;

    /**
     * Returns the option value images.
     *
     * @return Media|NULL
     */
    public function getImages(): ?Media {
        return $this->images;
    }

    protected function setImages(array $images): void {
        $this->images = new Media($images);
    }
}
