<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the name trait.
 *
 * @see ElementModuleTrait::getModule()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait ElementModuleTrait {

    protected string $module = '';

    /**
     * Returns the element module.
     *
     * @return string
     */
    public function getModule(): string {
        return $this->module;
    }
}
