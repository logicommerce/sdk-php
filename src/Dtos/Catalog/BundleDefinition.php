<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the BundleDefinition class.
 * The information of API BundleDefinition will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BundleDefinition::getSections()
 * @see BundleDefinition::getLanguage()
 *
 * @see Element
 * 
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 * @uses ElementDescriptionTrait
 * @uses IntegrableElementTrait
 *
 * @package SDK\Dtos\Catalog
 */
class BundleDefinition extends Element {
    use ElementTrait, IdentifiableElementTrait, ElementDescriptionTrait, IntegrableElementTrait;

    protected ?BundleDefinitionLanguage $language = null;
    
    protected array $sections = [];

    /**
     * Returns the bundle definition language object.
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

    /**
     * Returns the sections array.
     *
     * @return BundleDefinitionSection[]
     */
    public function getSections(): array {
        return $this->sections;
    }

    protected function setSections(array $sections): void {
        $this->sections = $this->setArrayField($sections, BundleDefinitionSection::class);
    }

}
