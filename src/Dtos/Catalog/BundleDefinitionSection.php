<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the BundleDefinitionSection class.
 * The information of API Categories will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BundleDefinitionSection::getLanguage()
 *
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 * @uses IntegrableElementTrait
 *
 * @package SDK\Dtos\Catalog
 */
class BundleDefinitionSection {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected ?BundleDefinitionLanguage $language = null;
    
    /**
     * Returns the category language object.
     *
     * @see BundleDefinitionLanguage
     * @return BundleDefinitionLanguage|NULL
     */
    public function getLanguage(): ?BundleDefinitionLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new BundleDefinitionLanguage($language);
    }

}
