<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\ElementLinkAttributesTrait;
use SDK\Core\Dtos\Traits\ElementUrlSeoTrait;

/**
 * This is the blog settings language class.
 * The language information of API blog settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BlogSettingsLanguage::getDefaultLanguage()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 * @see ElementLinkAttributesTrait
 * @see ElementUrlSeoTrait
 *
 * @package SDK\Dtos\Settings
 */
class BlogSettingsLanguage{
    use ElementTrait, ElementNameTrait, ElementDescriptionTrait, ElementLinkAttributesTrait, ElementUrlSeoTrait;

    protected bool $defaultLanguage = false;

    /**
     * Sets if this language is the default one for the blog or not.
     *
     * @return bool
     */
    public function getDefaultLanguage(): bool {
        return $this->defaultLanguage;
    }
}
