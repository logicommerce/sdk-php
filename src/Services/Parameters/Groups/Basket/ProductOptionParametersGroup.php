<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\IdentifiableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Basket\EditProductOptionParametersValidator;

/**
 * This is the basket model (edit product resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class ProductOptionParametersGroup extends ParametersGroup {
    use IdentifiableItemsParametersGroupTrait;

    protected array $values;

    /**
     * Sets an array of values as a parameter for this parameters group.
     *
     * @param array $values
     *
     * @return void
     */
    public function setValues(array $values): void {
        $this->values = [];
        foreach ($values as $value) {
            $this->addValue($value);
        }
    }

    /**
     * Adds a new value to the array of values for this parameters group.
     *
     * @param ProductOptionValueParametersGroup $value
     * 
     * @return void
     */
    public function addValue(ProductOptionValueParametersGroup $value): void {
        $this->values ??= [];
        $this->values[] = $value;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): EditProductOptionParametersValidator {
        return new EditProductOptionParametersValidator();
    }
}
