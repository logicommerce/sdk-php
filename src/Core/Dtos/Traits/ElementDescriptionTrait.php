<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the description trait.
 *
 * @see ElementDescriptionTrait::getDescription()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait ElementDescriptionTrait {

    protected string $description = '';

    /**
     * Returns the element description on the website current language.
     *
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }
}
