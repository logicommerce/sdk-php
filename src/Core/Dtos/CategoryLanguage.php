<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementIndexableTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementLinkAttributesTrait;
use SDK\Core\Dtos\Traits\ElementUrlSeoTrait;
use SDK\Core\Dtos\Traits\TargetTrait;
use SDK\Core\Dtos\Traits\LinkTrait;

/**
 * This is the Category Language class.
 * The language information of API categories will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CategoryLanguage::getDestinationUrl()
 * @see CategoryLanguage::getLargeImage()
 * @see CategoryLanguage::getLargeTitleImage()
 * @see CategoryLanguage::getLongDescription()
 * @see CategoryLanguage::getShortDescription()
 * @see CategoryLanguage::getSmallImage()
 * @see CategoryLanguage::getSmallTitleImage()
 *
 * @see ElementNameTrait
 * @see ElementLinkAttributesTrait
 * @see ElementUrlSeoTrait
 * @see TargetTrait
 * @see LinkTrait
 *
 * @package SDK\Dtos\Catalog
 */
abstract class CategoryLanguage {
    use ElementNameTrait, ElementLinkAttributesTrait, ElementUrlSeoTrait, TargetTrait, LinkTrait, ElementIndexableTrait;

    protected string $destinationUrl = '';

    protected string $largeImage = '';

    protected string $smallImage = '';

    protected string $shortDescription = '';

    protected string $smallTitleImage = '';

    protected string $largeTitleImage = '';

    /**
     * Returns the category destination URL for the website current language.
     *
     * @return string
     */
    public function getDestinationUrl(): string {
        return $this->destinationUrl;
    }

    /**
     * Returns the category large image for the website current language.
     *
     * @return string
     */
    public function getLargeImage(): string {
        return $this->largeImage;
    }

    /**
     * Returns the category small image for the website current language.
     *
     * @return string
     */
    public function getSmallImage(): string {
        return $this->smallImage;
    }

    /**
     * Returns the category short description for the website current language.
     *
     * @return string
     */
    public function getShortDescription(): string {
        return $this->shortDescription;
    }

    /**
     * Returns the title for the category small image for the website current language.
     *
     * @return string
     */
    public function getSmallTitleImage(): string {
        return $this->smallTitleImage;
    }

    /**
     * Returns the category large title for the website current language.
     *
     * @return string
     */
    public function getLargeTitleImage(): string {
        return $this->largeTitleImage;
    }
}
