<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the session aggregate shopping list data class.
 * The session aggregate shopping list data will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see SessionAggregateShoppingList::getProducts()
 * @see SessionAggregateShoppingList::getProductIdList()
 * @see SessionAggregateShoppingList::getBundles()
 * @see SessionAggregateShoppingList::getBundleIdList()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos
 */
class SessionAggregateShoppingList extends Element {
    use ElementTrait;

    protected int $products = 0;

    protected array $productIdList = [];

    protected int $bundles = 0;

    protected array $bundleIdList = [];

    /**
     * Returns the shopping list total of products.
     *
     * @return int
     */
    public function getProducts(): int {
        return $this->products;
    }

    /**
     * Returns a list of product internal identifiers that belongs to the products the shopping list is made of.
     *
     * @return int[]
     */
    public function getProductIdList(): array {
        return $this->productIdList;
    }

    /**
     * Returns the shopping list total of bundles.
     *
     * @return int
     */
    public function getBundles(): int {
        return $this->bundles;
    }

    /**
     * Returns a list of bundle internal identifiers that belongs to the products the shopping list is made of.
     *
     * @return int[]
     */
    public function getBundleIdList(): array {
        return $this->bundleIdList;
    }

}
