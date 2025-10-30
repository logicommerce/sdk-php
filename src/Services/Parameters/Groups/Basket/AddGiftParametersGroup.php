<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\AddGiftParametersValidator;

/**
 * This is the basket model (add selectable gift resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class AddGiftParametersGroup extends ParametersGroup {

    protected int $discountSelectableGiftId;

    protected int $productId;

    protected array $options;

    /**
     * Sets the internal identifier of the discount
     *
     * @param int $discountSelectableGiftId
     *
     * @return void
     */
    public function setDiscountSelectableGiftId(int $discountSelectableGiftId): void {
        $this->discountSelectableGiftId = $discountSelectableGiftId;
    }

    /**
     * Sets the internal identifier of the gift product
     *
     * @param int $productId
     *
     * @return void
     */
    public function setProductId(int $productId): void {
        $this->productId = $productId;
    }

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
    protected function getValidator(): AddGiftParametersValidator {
        return new AddGiftParametersValidator();
    }
}
