<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the Area class.
 * The information of API Areas will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Area::getActive()
 * @see Area::getBrandRole()
 * @see Area::getCategoryRole()
 * @see Area::getLanguage()
 * @see Area::getPosition()
 * @see Area::getActive()
 * @see Area::getPriority()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementNameTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\Catalog
 */
class Area extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, ElementNameTrait;

    protected bool $categoryRole = false;

    protected bool $brandRole = false;

    protected int $position = 0;

    protected bool $active = false;

    protected int $priority = 0;

    protected ?AreaLanguage $language = null;

    /**
     * Sets if the area is the one with the category role.
     *
     * @return bool
     */
    public function getCategoryRole(): bool {
        return $this->categoryRole;
    }

    /**
     * Sets if the area is the one with the brand role.
     *
     * @return bool
     */
    public function getBrandRole(): bool {
        return $this->brandRole;
    }

    /**
     * Returns the area position.
     *
     * @return int
     */
    public function getPosition(): int {
        return $this->position;
    }

    /**
     * Sets if the area is active or not.
     *
     * @return bool
     */
    public function getActive(): bool {
        return $this->active;
    }

    /**
     * Returns the area priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the area language object.
     *
     * @see AreaLanguage
     * @return AreaLanguage|NULL
     */
    public function getLanguage(): ?AreaLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new AreaLanguage($language);
    }
}
