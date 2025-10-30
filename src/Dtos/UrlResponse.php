<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the url response class.
 * The url responses will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos
 */
class UrlResponse extends Element {
    use ElementTrait;

    protected string $url = '';

    /**
     * Returns the url.
     *
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }
}