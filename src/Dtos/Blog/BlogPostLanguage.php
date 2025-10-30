<?php

namespace SDK\Dtos\Blog;

use SDK\Core\Dtos\Traits\ElementIndexableTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementLinkAttributesTrait;
use SDK\Core\Dtos\Traits\ElementUrlSeoTrait;

/**
 * This is the blog post language class.
 * The language information of API blog posts will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BlogPostLanguage::getShortText()
 * @see BlogPostLanguage::getContent()
 * @see BlogPostLanguage::getSmallTitleImage()
 * @see BlogPostLanguage::getLargeTitleImage()
 * @see BlogPostLanguage::getAltImageKeywords()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see ElementLinkAttributesTrait
 * @see ElementUrlSeoTrait
 *
 * @package SDK\Dtos\Blog
 */
class BlogPostLanguage {
    use ElementTrait, ElementNameTrait, ElementLinkAttributesTrait, ElementUrlSeoTrait, ElementIndexableTrait;

    protected string $shortText = '';

    protected string $content = '';

    protected string $smallTitleImage = '';

    protected string $largeTitleImage = '';

    protected string $altImageKeywords = '';

    /**
     * Returns the blog post short text for the website current language.
     *
     * @return string
     */
    public function getShortText(): string {
        return $this->shortText;
    }

    /**
     * Returns the blog post content for the website current language.
     *
     * @return string
     */
    public function getContent(): string {
        return $this->content;
    }

    /**
     * Returns the blog post small title image for the website current language.
     *
     * @return string
     */
    public function getSmallTitleImage(): string {
        return $this->smallTitleImage;
    }

    /**
     * Returns the blog post large title image for the website current language.
     *
     * @return string
     */
    public function getLargeTitleImage(): string {
        return $this->largeTitleImage;
    }

    /**
     * Returns the blog post alternative image keywords for the website current language.
     *
     * @return string
     */
    public function getAltImageKeywords(): string {
        return $this->altImageKeywords;
    }
}
