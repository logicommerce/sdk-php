<?php declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the product comment collection class.
 * The product comments will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductCommentCollection::getRating()
 *
 * @see ElementCollection
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos
 */
class ProductCommentCollection extends ElementCollection {
    use ElementTrait;

    protected float $rating = 0.0;

    /**
     * Returns the average rating of the comments on this collection.
     *
     * @return float
     */
    public function getRating(): float {
        return $this->rating;
    }
}
