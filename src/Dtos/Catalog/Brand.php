<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\DateAddedTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the Brand class.
 * The information of API Brands will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Brand::getActive()
 * @see Brand::getDeleted()
 * @see Brand::getFeatured()
 * @see Brand::getLanguage()
 * @see Brand::getPriority()
 * @see Brand::getOffer()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos\Catalog
 */
class Brand extends Element {
    use ElementTrait, IdentifiableElementTrait, DateAddedTrait, IntegrableElementTrait;

    protected bool $active = false;

    protected bool $deleted = false;

    protected bool $featured = false;

    protected ?BrandLanguage $language = null;

    protected int $priority = 0;

    protected bool $offer = false;

    /**
     * Sets if the brand is active or not.
     *
     * @return bool
     */
    public function getActive(): bool {
        return $this->active;
    }

    /**
     * Sets if the brand is a featured or not.
     *
     * @return bool
     */
    public function getFeatured(): bool {
        return $this->featured;
    }
    
    /**
     * Returns the brand priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the brand language object.
     *
     * @see BrandLanguage
     * @return BrandLanguage|NULL
     */
    public function getLanguage(): ?BrandLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new BrandLanguage($language);
    }

    /**
     * Sets if the brand is a offer or not.
     *
     * @return bool
     */
    public function getOffer(): bool {
        return $this->offer;
    }

    /**
     * Sets if the brand is a deleted or not.
     *
     * @return bool
     */
    public function getDeleted(): bool {
        return $this->deleted;
    }

}
