<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementIndexableTrait;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Route Metadata class.
 * The Route Metadata will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ElementTrait
 * @see ElementIndexableTrait
 *
 * @package SDK\Dtos\Common
 */
class RouteMetadata extends Element {
    use ElementTrait, ElementIndexableTrait;

    protected ?RouteMetadataLanguage $language = null;

    /**
     * Returns the metadata language object.
     *
     * @see RouteMetadataLanguage
     * @return RouteMetadataLanguage|NULL
     */
    public function getLanguage(): ?RouteMetadataLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new RouteMetadataLanguage($language);
    }

}
