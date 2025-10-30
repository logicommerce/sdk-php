<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\ElementIndexableTrait;
use SDK\Core\Dtos\Traits\ElementLinkAttributesTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementUrlSeoTrait;

/**
 * This is the Brand Language class.
 * The language information of API brands will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BrandLanguage::getLargeImage()
 * @see BrandLanguage::getLargeTitleImage()
 * @see BrandLanguage::getLongDescription()
 * @see BrandLanguage::getShortDescription()
 * @see BrandLanguage::getSmallImage()
 * @see BrandLanguage::getSmallTitleImage()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 * @see ElementUrlSeoTrait
 * @see ElementLinkAttributesTrait
 * @see ElementIndexableTrait
 *
 * @package SDK\Dtos\Catalog
 */
class BrandLanguage {
    use ElementTrait, ElementNameTrait, ElementDescriptionTrait, ElementUrlSeoTrait, ElementLinkAttributesTrait, ElementIndexableTrait;
    
    protected string $largeImage = '';

    protected string $largeTitleImage = '';

    protected string $longDescription = '';

    protected string $shortDescription = '';

    protected string $smallImage = '';

    protected string $smallTitleImage = '';

    /**
     * Returns the brand small image for the website current language.
     *
     * @return string
     */
    public function getSmallImage(): string {
        return $this->smallImage;
    }

    /**
     * Returns the title for the brand small image for the website current language.
     *
     * @return string
     */
    public function getSmallTitleImage(): string {
        return $this->smallTitleImage;
    }

    /**
     * Returns the brand short description.
     *
     * @return string
     */
    public function getShortDescription(): string {
        return $this->shortDescription;
    }

    /**
     * Returns the brand long description.
     *
     * @return string
     */
    public function getLongDescription(): string {
        return $this->longDescription;
    }

    /**
     * Returns the brand large image for the website current language.
     *
     * @return string
     */
    public function getLargeImage(): string {
        return $this->largeImage;
    }
    
    /**
     * Returns the brand large title for the website current language.
     *
     * @return string
     */
    public function getLargeTitleImage(): string {
        return $this->largeTitleImage;
    }

}
