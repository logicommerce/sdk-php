<?php

namespace SDK\Dtos\Catalog\Page;

use SDK\Core\Dtos\Traits\ElementIndexableTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementLinkAttributesTrait;
use SDK\Core\Dtos\Traits\ElementUrlSeoTrait;
use SDK\Core\Dtos\Traits\TargetTrait;
use SDK\Core\Dtos\Traits\LinkTrait;

/**
 * This is the Page Language class.
 * The language information of API pages will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PageLanguage::getDestinationUrl()
 * @see PageLanguage::getLargeImage()
 * @see PageLanguage::getLargeTitle()
 * @see PageLanguage::getPageContent()
 * @see PageLanguage::getSmallImage()
 * @see PageLanguage::getSmallTitle()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see ElementLinkAttributesTrait
 * @see ElementUrlSeoTrait
 * @see TargetTrait
 * @see LinkTrait
 *
 * @package SDK\Dtos\Catalog\Page
 */
class PageLanguage {
    use ElementTrait, ElementNameTrait, ElementLinkAttributesTrait, ElementUrlSeoTrait, TargetTrait, LinkTrait, ElementIndexableTrait;

    protected string $smallImage = '';

    protected string $largeImage = '';

    protected string $smallTitle = '';

    protected string $largeTitle = '';

    protected string $pageContent = '';

    protected string $destinationUrl = '';

    /**
     * Returns the page small image for the website current language.
     *
     * @return string
     */
    public function getSmallImage(): string {
        return $this->smallImage;
    }

    /**
     * Returns the page large image for the website current language.
     *
     * @return string
     */
    public function getLargeImage(): string {
        return $this->largeImage;
    }

    /**
     * Returns the page small title on the website current language.
     *
     * @return string
     */
    public function getSmallTitle(): string {
        return $this->smallTitle;
    }

    /**
     * Returns the page large title on the website current language.
     *
     * @return string
     */
    public function getLargeTitle(): string {
        return $this->largeTitle;
    }

    /**
     * Returns the page content on the website current language.
     *
     * @return string
     */
    public function getPageContent(): string {
        return $this->pageContent;
    }

    /**
     * Returns the page destination URL for the website current language.
     *
     * @return string
     */
    public function getDestinationUrl(): string {
        return $this->destinationUrl;
    }
}
