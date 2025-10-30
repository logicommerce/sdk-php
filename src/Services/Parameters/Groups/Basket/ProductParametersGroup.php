<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Enums\ProductType;

/**
 * This is the basket model (base for product resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
abstract class ProductParametersGroup extends ParametersGroup {

    protected int $quantity;

    protected array $options;

    protected int $fromShoppingListRow;
    
    protected string $productType = ProductType::PRODUCT;


    /**
     * Sets the quantity parameter for this parameters group.
     *
     * @param int $quantity
     *
     * @return void
     */
    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

    /**	
     * Internal identifier of the shopping list row that has motivated this action. Useful parameter if you want to offer the 'KeepPurchasedItems' functionality of the shopping lists.Sets the quantity parameter for this parameters group.
     *
     * @param int $fromShoppingListRow
     *
     * @return void
     */
    public function setFromShoppingListRow(int $fromShoppingListRow): void {
        $this->fromShoppingListRow = $fromShoppingListRow;
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
     * Sets the product type for this parameters group.
     *
     * @param string $productType
     *
     * @return void
     */
    public function setProductType(string $productType): void {
        $this->productType = $productType;
    }    
}
