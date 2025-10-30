<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the shipper language class.
 * The language information of API shippers will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ShipperLanguage::getUrl()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Basket
 */
class ShipperLanguage {
    use ElementTrait, ElementNameTrait;

    protected string $url = '';

    /**
     * Returns the shipper url for the website current language.
     *
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }
}
