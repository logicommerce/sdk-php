<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Codes class.
 * The Codes information of API elements will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Codes::getSku()
 * @see Codes::getJan()
 * @see Codes::getIsbn()
 * @see Codes::getEan()
 * @see Codes::getUpc()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class Codes {
    use ElementTrait;

    protected string $sku = '';

    protected string $jan = '';

    protected string $isbn = '';

    protected string $ean = '';

    protected string $upc = '';

    /**
     * Returns the element SKU.
     *
     * @return string
     */
    public function getSku(): string {
        return $this->sku;
    }

    /**
     * Returns the element JAN.
     *
     * @return string
     */
    public function getJan(): string {
        return $this->jan;
    }

    /**
     * Returns the element ISBN.
     *
     * @return string
     */
    public function getIsbn(): string {
        return $this->isbn;
    }

    /**
     * Returns the element EAN.
     *
     * @return string
     */
    public function getEan(): string {
        return $this->ean;
    }

    /**
     * Returns the element UPC.
     *
     * @return string
     */
    public function getUpc(): string {
        return $this->upc;
    }
}
