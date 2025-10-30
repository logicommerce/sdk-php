<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the name trait.
 *
 * @see ElementNameTrait::getName()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait ElementNameTrait {

    protected string $name = '';

    /**
     * Returns the element name on the website current language.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }
}
