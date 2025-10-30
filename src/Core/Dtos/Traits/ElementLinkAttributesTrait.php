<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the linkAttributes trait.
 *
 * @see ElementLinkAttributesTrait::getLinkAttributes()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait ElementLinkAttributesTrait {

    protected array $linkAttributes = [];

    /**
     * Returns the element link attributes URL for the website current language.
     *
     * @return array
     */
    public function getLinkAttributes(): array {
        return $this->linkAttributes;
    }
}
