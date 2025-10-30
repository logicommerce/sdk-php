<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Alternate class.
 * The API Alternates will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Alternate::getHreflang()
 * @see Alternate::getHref()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class Alternate {
    use ElementTrait;

    protected string $hreflang = '';

    protected string $href = '';

    /**
     * Returns the route hreflang.
     *
     * @return string
     */
    public function getHreflang(): string {
        return $this->hreflang;
    }

    /**
     * Returns the route href.
     *
     * @return string
     */
    public function getHref(): string {
        return $this->href;
    }
}
