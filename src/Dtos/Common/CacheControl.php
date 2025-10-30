<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the cache control class.
 * The cache control information of API elements will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CacheControl::getTTL()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class CacheControl {
    use ElementTrait;

    protected int $ttl = 0;

    /**
     * Returns the tax ttl.
     *
     * @return int
     */
    public function getTtl(): int {
        return $this->ttl;
    }
}
