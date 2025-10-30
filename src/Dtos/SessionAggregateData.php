<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the session aggregate data class.
 * The session aggregate data will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see SessionAggregateData::getBasket()
 * @see SessionAggregateData::getWishlist()
 * @see SessionAggregateData::getProductComparison()
 * @see SessionAggregateData::getShoppingLists()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos
 */
class SessionAggregateData extends Element {
    use ElementTrait;

    protected ?SessionAggregateBasket $basket = null;

    protected ?SessionAggregateWishlist $wishlist = null;

    protected ?SessionAggregateProductComparison $productComparison = null;

    protected ?SessionAggregateShoppingLists $shoppingLists = null;

    /**
     * Returns the basket aggregate data.
     *
     * @return SessionAggregateBasket|NULL
     */
    public function getBasket(): ?SessionAggregateBasket {
        return $this->basket;
    }

    protected function setBasket($basket): void {
        $this->basket = new SessionAggregateBasket($basket);
    }

    /**
     * Returns the wishlist aggregate data.
     *
     * @return SessionAggregateWishlist|NULL
     * @deprecated
     */
    public function getWishlist(): ?SessionAggregateWishlist {
        // trigger_error("The function 'getWishlist' will be deprecated soon. you must use 'getShoppingList'");
        if (!is_null($this->shoppingLists)) {
            return new SessionAggregateWishlist(['items' => $this->shoppingLists->getDefaultOne()->getProducts(), 'itemIdList' => $this->shoppingLists->getDefaultOne()->getProductIdList()]);
        }
        return new SessionAggregateWishlist();
    }

    protected function setWishlist($wishlist): void {
        $this->wishlist = null;
    }

    /**
     * Returns the productComparison aggregate data.
     *
     * @return SessionAggregateProductComparison|NULL
     */
    public function getProductComparison(): ?SessionAggregateProductComparison {
        return $this->productComparison;
    }

    protected function setProductComparison($productComparison): void {
        $this->productComparison = new SessionAggregateProductComparison($productComparison);
    }

    /**
     * Returns the shoppingLists aggregate data.
     *
     * @return SessionAggregateShoppingLists|NULL
     */
    public function getShoppingLists(): ?SessionAggregateShoppingLists {
        return $this->shoppingLists;
    }

    protected function setShoppingLists(array $shoppingLists): void {
        $this->shoppingLists = new SessionAggregateShoppingLists($shoppingLists);
    }
}
