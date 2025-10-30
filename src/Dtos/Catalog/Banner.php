<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\TargetTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Dtos\Traits\DateAddedTrait;

/**
 * This is the Banner class.
 * The information of API Banners will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Banner::getPosition()
 * @see Banner::getPriority()
 * @see Banner::getLanguage()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see TargetTrait
 * @see DateAddedTrait
 *
 * @package SDK\Dtos\Catalog
 */
class Banner extends Element {
    use ElementTrait,
        IdentifiableElementTrait,
        IntegrableElementTrait,
        ElementNameTrait,
        ElementDescriptionTrait,
        TargetTrait,
        DateAddedTrait;

    protected int $position = 0;

    protected int $priority = 0;

    protected ?BannerLanguage $language = null;

    /**
     * Returns the banner position.
     *
     * @return int
     */
    public function getPosition(): int {
        return $this->position;
    }

    /**
     * Returns the banner priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the page language object.
     *
     * @see BannerLanguage
     * @return BannerLanguage|NULL
     */
    public function getLanguage(): ?BannerLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new BannerLanguage($language);
    }
}

