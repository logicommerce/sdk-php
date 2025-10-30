<?php

namespace SDK\Dtos\Blog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementIndexableTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementLinkAttributesTrait;
use SDK\Core\Dtos\Traits\ElementUrlSeoTrait;
use SDK\Core\Dtos\Traits\TargetTrait;
use SDK\Core\Dtos\Traits\LinkTrait;

/**
 * This is the blog category language class.
 * The language information of API blog categories will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BlogCategoryLanguage::getShortDescription()
 * @see BlogCategoryLanguage::getLongDescription()
 * @see BlogCategoryLanguage::getSmallTitleImage()
 * @see BlogCategoryLanguage::getLargeTitleImage()
 * @see BlogCategoryLanguage::getDestinationURL()
 * @see BlogCategoryLanguage::getTarget()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementNameTrait
 * @see ElementLinkAttributesTrait
 * @see ElementUrlSeoTrait
 * @see TargetTrait
 * @see LinkTrait
 *
 * @package SDK\Dtos\Blog
 */
class BlogCategoryLanguage extends Element
 {
    use ElementTrait, ElementNameTrait, ElementLinkAttributesTrait, ElementUrlSeoTrait, TargetTrait, LinkTrait, ElementIndexableTrait;

    protected string $shortDescription = '';

    protected string $longDescription = '';

    protected string $smallTitleImage = '';

    protected string $largeTitleImage = '';

    protected string $destinationURL = '';

    /**
     * Returns the blog category short description for the website current language.
     *
     * @return string
     */
    public function getShortDescription(): string {
        return $this->shortDescription;
    }

    /**
     * Returns the blog category long description for the website current language.
     *
     * @return string
     */
    public function getLongDescription(): string {
        return $this->longDescription;
    }

    /**
     * Returns the blog category small title image for the website current language.
     *
     * @return string
     */
    public function getSmallTitleImage(): string {
        return $this->smallTitleImage;
    }

    /**
     * Returns the blog category large title image for the website current language.
     *
     * @return string
     */
    public function getLargeTitleImage(): string {
        return $this->largeTitleImage;
    }

    /**
     * Returns the blog category destination URL for the website current language.
     *
     * @return string
     */
    public function getDestinationURL(): string {
        return $this->destinationURL;
    }
}
