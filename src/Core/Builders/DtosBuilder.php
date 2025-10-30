<?php declare(strict_types=1);

namespace SDK\Core\Builders;

use SDK\Core\Dtos\Element;

/**
 * This is the builder to dinamically create DTOs.
 *
 * @see DtosBuilder::build()
 *
 * @see Builder
 *
 * @package SDK\Core\Builders
 */
class DtosBuilder extends Builder {

    protected function getMainClass(): string {
        return Element::class;
    }

    /**
     * Returns the created DTO.
     */
    public function build(): Element {
        return new $this->class($this->data);
    }
}
