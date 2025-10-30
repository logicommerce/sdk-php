<?php

namespace SDK\Dtos\User;

use SDK\Core\Resources\Date;
use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Dtos\Catalog\Product\StockAlert\StockAlert;

/**
 * This is the user stock alerts main class.
 * The user stock alerts information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserStockAlert::getEmail()
 * @see UserStockAlert::getSubscriptionDate()
 * @see UserStockAlert::getProduct()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos\User
 */
class UserStockAlert extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected string $email = '';

    protected ?Date $subscriptionDate = null;

    protected ?StockAlert $product = null;

    /**
     * Returns the subscriber email.
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Returns the date when the subscription was maded.
     *
     * @return Date|NULL
     */
    public function getSubscriptionDate(): ?Date {
        return $this->subscriptionDate;
    }

    protected function setSubscriptionDate(string $subscriptionDate): void {
        $this->subscriptionDate = Date::create($subscriptionDate);
    }

    /**
     * Returns the stock subscription StockAlert object.
     *
     * @return StockAlert|NULL
     */
    public function getProduct(): ?StockAlert {
        return $this->product;
    }

    protected function setProduct(array $product): void {
        $this->product = new StockAlert($product);
    }
}
