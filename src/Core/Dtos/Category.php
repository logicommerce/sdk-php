<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the Category class.
 * The information of API Categories will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Category::getFeatured
 * @see Category::getOffer
 *
 * @see Element
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Core\Dtos
 */
abstract class Category extends Element {
    use IdentifiableElementTrait, IntegrableElementTrait;

    protected bool $featured = false;

    protected bool $offer = false;

    /**
     * Returns if this category is a featured one.
     *
     * @return bool
     */
    public function getFeatured(): bool {
        return $this->featured;
    }

    /**
     * Returns if this category is a offers one.
     *
     * @return bool
     */
    public function getOffer(): bool {
        return $this->offer;
    }

}
