<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Banner Language class.
 * The language information of API banners will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BannerLanguage::getAlt()
 * @see BannerLanguage::getImage()
 * @see BannerLanguage::getDestinationUrl()
 * @see BannerLanguage::getLinkFollowing()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog
 */
class BannerLanguage {
    use ElementTrait;

    protected string $image = '';

    protected string $destinationUrl = '';

    protected string $alt = '';

    protected bool $linkFollowing = false;

    /**
     * Returns the banner image for the website current language.
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * Returns the banner destination URL for the website current language.
     *
     * @return string
     */
    public function getDestinationUrl(): string {
        return $this->destinationUrl;
    }

    /**
     * Returns the banner alt attribute for the website current language.
     *
     * @return string
     */
    public function getAlt(): string {
        return $this->alt;
    }

    /**
     * Sets if the banner link must be a following one or not (value of rel HTML attribute) for the website current language.
     *
     * @return bool
     */
    public function getLinkFollowing(): bool {
        return $this->linkFollowing;
    }
}
