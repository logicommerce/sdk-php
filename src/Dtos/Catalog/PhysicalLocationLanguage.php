<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Physical Location Language class.
 * The language information of API categories will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PhysicalLocationLanguage::getInformation()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog
 */
class PhysicalLocationLanguage extends Element {
    use ElementTrait;

    protected string $information = '';

    /**
     * Returns the Physical Location information for the website current language.
     *
     * @return string
     */
    public function getInformation(): string {
        return $this->information;
    }
}
