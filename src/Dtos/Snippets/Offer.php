<?php

namespace SDK\Dtos\Snippets;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Resources\Date;

/**
 * This is the rich snippets offer section class.
 * The rich snippets offer section will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Offer::getUrl()
 * @see Offer::getPriceValidUntil()
 * @see Offer::getPrice()
 * @see Offer::getPriceCurrency()
 * @see Offer::getAvailability()
 *
 * @see RichSnippets
 * @see ElementTrait
 *
 * @package SDK\Dtos\Snippets
 */
class Offer extends RichSnippets {
    use ElementTrait;

    protected string $url = '';

    protected ?Date $priceValidUntil = null;

    protected float $price = 0.0;

    protected string $priceCurrency = '';

    protected string $availability = '';

    /**
     * Returns the rich snippet offer url.
     *
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }

    /**
     * Returns the rich snippet offer price valid until.
     *
     * @return Date|NULL
     */
    public function getPriceValidUntil(): ?Date {
        return $this->priceValidUntil;
    }

    protected function setPriceValidUntil(string $priceValidUntil): void {
        $this->priceValidUntil = Date::create($priceValidUntil);
    }

    /**
     * Returns the rich snippet offer price.
     *
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * Returns the rich snippet offer price currency.
     *
     * @return string
     */
    public function getPriceCurrency(): string {
        return $this->priceCurrency;
    }

    /**
     * Returns the rich snippet offer availability.
     *
     * @return string
     */
    public function getAvailability(): string {
        return $this->availability;
    }
}
