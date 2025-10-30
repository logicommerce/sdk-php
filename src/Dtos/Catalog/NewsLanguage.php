<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementLinkAttributesTrait;
use SDK\Core\Dtos\Traits\ElementUrlSeoTrait;

/**
 * This is the News Language class.
 * The language information of API news will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see NewsLanguage::getPageText()
 * @see NewsLanguage::getShortText()
 * @see NewsLanguage::getTitle()
 *
 * @see ElementTrait
 * @see ElementLinkAttributesTrait
 * @see ElementUrlSeoTrait
 *
 * @package SDK\Dtos\Catalog
 */
class NewsLanguage {
    use ElementTrait, ElementLinkAttributesTrait, ElementUrlSeoTrait;

    protected string $title = '';

    protected string $shortText = '';

    protected string $pageText = '';

    /**
     * Returns the news title on the website current language.
     *
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * Returns the news short text on the website current language.
     *
     * @return string
     */
    public function getShortText(): string {
        return $this->shortText;
    }

    /**
     * Returns the news page text on the website current language.
     *
     * @return string
     */
    public function getPageText(): string {
        return $this->pageText;
    }
}
