<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the ResponseSetRows class.
 * The ResponseSetRows information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ResponseSetRows::getBasket()
 * @see ResponseSetRows::getIncidences()
 * @see ResponseSetRows::getBundleIncidences()
 *
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class ResponseSetRows extends Element {
    use ElementTrait;

    protected ?Basket $basket = null;

    protected array $incidences = [];

    protected array $bundleIncidences = [];

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
     * Returns the incidences.
     *
     * @return WarningAddProduct[]
     */
    public function getIncidences(): array {
        return $this->incidences;
    }

    protected function setIncidences(array $incidences): void {
        $this->incidences = $this->setArrayField($incidences, WarningAddProduct::class);
    }

    /**
     * Returns the incidences.
     *
     * @return WarningAddBundle[]
     */
    public function getBundleIncidences(): array {
        return $this->bundleIncidences;
    }

    protected function setBundleIncidences(array $bundleIncidences): void {
        $this->bundleIncidences = $this->setArrayField($bundleIncidences, WarningAddBundle::class);
    }
}
