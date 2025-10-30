<?php

namespace SDK\Dtos\Snippets;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich snippets rating section class.
 * The rich snippets rating section will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Rating::getWorstRating()
 * @see Rating::getBestRating()
 * @see Rating::getRatingValue()
 *
 * @see RichSnippets
 * @see ElementTrait
 *
 * @package SDK\Dtos\Snippets
 */
class Rating extends RichSnippets {
    use ElementTrait;

    protected int $worstRating = 0;

    protected int $bestRating = 0;

    protected int $ratingValue = 0;

    /**
     * Returns the rating rich snippet worst rating.
     *
     * @return int
     */
    public function getWorstRating(): int {
        return $this->worstRating;
    }

    /**
     * Returns the rating rich snippet best rating.
     *
     * @return int
     */
    public function getBestRating(): int {
        return $this->bestRating;
    }

    /**
     * Returns the rating rich snippet rating value.
     *
     * @return int
     */
    public function getRatingValue(): int {
        return $this->ratingValue;
    }
}
