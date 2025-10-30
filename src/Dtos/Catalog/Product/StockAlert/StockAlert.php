<?php

namespace SDK\Dtos\Catalog\Product\StockAlert;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Catalog\Media;

/**
 * This is the stock alert class.
 * The stock alerts of API products will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see StockAlert::getProductCombination()
 * @see StockAlert::getImages()
 * @see StockAlert::getUrl()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Catalog\Product\StockAlert
 */
class StockAlert extends Element {
    use ElementTrait, ElementNameTrait;

    protected ?Combination $productCombination = null;

    protected ?Media $images = null;

    protected string $url = '';

    /**
     * Returns the stock alert product combination.
     *
     * @return Combination|NULL
     */
    public function getProductCombination(): ?Combination {
        return $this->productCombination;
    }

    protected function setProductCombination(array $productCombination): void {
        $this->productCombination = new Combination($productCombination);
    }

    /**
     * Returns the stock alert combination images.
     *
     * @return Media|NULL
     */
    public function getImages(): ?Media {
        return $this->images;
    }

    protected function setImages(array $images): void {
        $this->images = new Media($images);
    }

    /**
     * Returns the stock alert url.
     *
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }
}
