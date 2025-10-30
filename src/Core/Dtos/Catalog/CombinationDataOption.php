<?php

namespace SDK\Core\Dtos\Catalog;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the Current Data Option class.
 * The API Current Data Option data will be stored in that class and will remain immutable (only get methods are prevision)
 *
 * @see CombinationDataOption::getMissed()
 * @see CombinationDataOption::getValues()
 *
 * 
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 * 
 * @package SDK\Core\Dtos
 */
class CombinationDataOption {
    use ElementTrait, IdentifiableElementTrait;

    protected bool $missed = false;

    protected array $values = [];

    /**
     * Returns the missed.
     *
     * @return bool
     */
    public function getMissed(): bool {
        return $this->missed;
    }

    /**
     * Returns the values of the option in the filter.
     *
     * @return CombinationDataOptionValue[]
     */
    public function getValues(): array {
        return $this->values;
    }

    protected function setValues(array $values): void {
        $this->values = $this->setArrayField($values, CombinationDataOptionValue::class);
    }

}
