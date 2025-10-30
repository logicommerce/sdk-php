<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\IdentifiableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Basket\BundleItemParametersValidator;

/**
 * This is the basket model (edit product resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class BundleItemParametersGroup extends ParametersGroup {
    use IdentifiableItemsParametersGroupTrait;

    protected array $options;

    /**
     * Sets an array of options as a parameter for this parameters group.
     *
     * @param ProductOptionParametersGroup[] $options
     *
     * @return void
     */
    public function setOptions(array $options): void {
        $this->options = [];
        foreach ($options as $option) {
            $this->addOption($option);
        }
    }

    /**
     * Adds a new option to the array of options for this parameters group.
     *
     * @param ProductOptionParametersGroup $option
     *
     * @return void
     */
    public function addOption(ProductOptionParametersGroup $option): void {
        $this->options ??= [];
        $this->options[] = $option;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): BundleItemParametersValidator {
        return new BundleItemParametersValidator();
    }
}
