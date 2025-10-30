<?php

namespace SDK\Dtos\Blog;

use SDK\Core\Dtos\Traits\ElementIndexableTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementLinkAttributesTrait;
use SDK\Core\Dtos\Traits\ElementUrlSeoTrait;

/**
 * This is the blog tag language class.
 * The language information of API blog tags will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BlogTagLanguage::getValue()
 * @see BlogTagLanguage::getUrlSeo()
 *
 * @see ElementTrait
 * @see ElementLinkAttributesTrait
 * @see ElementUrlSeoTrait
 *
 * @package SDK\Dtos\Blog
 */
class BlogTagLanguage {
    use ElementTrait, ElementLinkAttributesTrait, ElementUrlSeoTrait, ElementIndexableTrait;

    protected string $value = '';

    /**
     * Returns the blog tag value for the website current language.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }
}
