<?php

namespace SDK\Dtos\Snippets;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich snippets aggregate offer section class.
 * The rich snippets aggregate offer section will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AggregateOffer::getUrl()
 *
 * @see RichSnippets
 * @see ElementTrait
 *
 * @package SDK\Dtos\Snippets
 */
class AggregateOffer extends RichSnippets {
    use ElementTrait;

    protected int $offerCount = 0;
    
    protected float $lowPrice = 0.0;
    
    protected float $highPrice = 0.0;
    
    protected string $priceCurrency = '';

    /**
     * Returns the rich snippet offer price currency.
     *
     * @return string
     */
    public function getPriceCurrency(): string {
        return $this->priceCurrency;
    }

    /**
     * Returns the rich snippet offer low price.
     *
     * @return float
     */
    public function getLowPrice(): float {
        return $this->lowPrice;
    }

    /**
     * Returns the rich snippet offer high price.
     *
     * @return float
     */
    public function getHighPrice(): float {
        return $this->highPrice;
    }

    /**
     * Returns the rich snippet offer offer count.
     *
     * @return int
     */
    public function getOfferCount(): int {
        return $this->offerCount;
    }
}
