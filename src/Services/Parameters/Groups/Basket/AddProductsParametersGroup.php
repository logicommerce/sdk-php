<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\AddProductsParametersValidator;

/**
 * This is the basket model (add products resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class AddProductsParametersGroup extends ParametersGroup {

    protected string $mode;

    protected array $products;

    /**
     * Sets the mode parameter for this parameters group.
     *
     * @param string $mode
     *
     * @return void
     */
    public function setMode(string $mode): void {
        $this->mode = $mode;
    }

    /**
     * Sets an array of AddProductParametersGroup
     *
     * @param AddProductParametersGroup[] $products
     *
     * @return void
     */
    public function setProducts(array $products): void {
        $this->products = [];
        foreach ($products as $product) {
            $this->addProduct($product);
        }
    }

    /**
     * Adds a new product to the array of products for this parameters group.
     *
     * @param AddProductParametersGroup $product
     *
     * @return void
     */
    public function addProduct(AddProductParametersGroup $product): void {
        $this->products ??= [];
        $this->products[] = $product;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AddProductsParametersValidator {
        return new AddProductsParametersValidator();
    }
}
