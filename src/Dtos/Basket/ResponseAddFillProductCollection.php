<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the ResponseAddFillProductCollection class.
 * The ResponseAddFillProductCollection information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ResponseAddFillProductCollection::getBasket()
 * @see ResponseAddFillProductCollection::getWarnings()
 *
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class ResponseAddFillProductCollection extends Element {
    use ElementTrait;

    protected ?Basket $basket = null;

    protected array $warnings = [];

    /**
     * Returns the basket.
     *
     * @return Basket|NULL
     */
    public function getBasket(): ?Basket {
        return $this->basket;
    }

    protected function setBasket(array $basket): void {
        $this->basket = new Basket($basket);
    }

    /**
     * Returns the warnings.
     *
     * @return WarningAddProduct[]
     */
    public function getWarnings(): array {
        return $this->warnings;
    }

    protected function setWarnings(array $warnings): void {
        $this->warnings = $this->setArrayField($warnings, WarningAddProduct::class);
    }
}
