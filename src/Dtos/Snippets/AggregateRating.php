<?php

namespace SDK\Dtos\Snippets;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich snippets aggregate rating section class.
 * The rich snippets aggregate rating section will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AggregateRating::getRatingCount()
 * @see AggregateRating::getReviewCount()
 *
 * @see Rating
 * @see ElementTrait
 *
 * @package SDK\Dtos\Snippets
 */
class AggregateRating extends Rating {
    use ElementTrait;

    protected int $ratingCount = 0;

    protected int $reviewCount = 0;

    /**
     * Returns the rating count of the rich snippet aggregate section.
     *
     * @return int
     */
    public function getRatingCount(): int {
        return $this->ratingCount;
    }

    /**
     * Returns the review count of the rich snippet aggregate section.
     *
     * @return int
     */
    public function getReviewCount(): int {
        return $this->reviewCount;
    }
}
