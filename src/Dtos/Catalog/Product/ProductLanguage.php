<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementIndexableTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementLinkAttributesTrait;
use SDK\Core\Dtos\Traits\ElementUrlSeoTrait;

/**
 * This is the Product Language class.
 * The language information of API products will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductLanguage::getAltImageKeywords()
 * @see ProductLanguage::getLargeTitleImage()
 * @see ProductLanguage::getLongDescription()
 * @see ProductLanguage::getShortDescription()
 * @see ProductLanguage::getSmallTitleImage()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see ElementLinkAttributesTrait
 * @see ElementUrlSeoTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class ProductLanguage {
    use ElementTrait, ElementNameTrait, ElementLinkAttributesTrait, ElementUrlSeoTrait, ElementIndexableTrait;

    protected string $shortDescription = '';

    protected string $smallTitleImage = '';

    protected string $longDescription = '';

    protected string $altImageKeywords = '';

    protected string $largeTitleImage = '';

    /**
     * Returns the product short description on the website current language.
     *
     * @return string
     */
    public function getShortDescription(): string {
        return $this->shortDescription;
    }

    /**
     * Returns the title for the product small image for the website current language.
     *
     * @return string
     */
    public function getSmallTitleImage(): string {
        return $this->smallTitleImage;
    }

    /**
     * Returns the product long description for the website current language.
     *
     * @return string
     */
    public function getLongDescription(): string {
        return $this->longDescription;
    }

    /**
     * Returns the keywords for the product image alt attribute for the website current language.
     *
     * @return string
     */
    public function getAltImageKeywords(): string {
        return $this->altImageKeywords;
    }

    /**
     * Returns the title for the product large image for the website current language.
     *
     * @return string
     */
    public function getLargeTitleImage(): string {
        return $this->largeTitleImage;
    }
}
