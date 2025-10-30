<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Route warning class.
 * The API Route warnings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RouteWarning::getUrl()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class RouteWarning {
    use ElementTrait;

    protected string $url = '';

    protected string $country = '';

    protected string $language = '';

    /**
     * Returns the route url.
     *
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }

    /**
     * Returns the route country.
     *
     * @return string
     */
    public function getCountry(): string {
        return $this->country;
    }

    /**
     * Returns the route language.
     *
     * @return string
     */
    public function getLanguage(): string {
        return $this->language;
    }
}
