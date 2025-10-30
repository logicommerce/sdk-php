<?php

namespace SDK\Core\Dtos\Catalog;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the Current Data Option Value class.
 * The API Current Data Option Value data will be stored in that class and will remain immutable (only get methods are prevision)
 *
 * @see CombinationDataOptionValue::getSelected()
 * @see CombinationDataOptionValue::getAvailable()
 *
 * 
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 * 
 * @package SDK\Core\Dtos
 */
class CombinationDataOptionValue {
    use ElementTrait, IdentifiableElementTrait;

    protected bool $selected = false;

    protected bool $available = false;

    /**
     * Returns the selected.
     *
     * @return bool
     */
    public function getSelected(): bool {
        return $this->selected;
    }

    /**
     * Returns the available.
     *
     * @return bool
     */
    public function getAvailable(): bool {
        return $this->available;
    }

}
