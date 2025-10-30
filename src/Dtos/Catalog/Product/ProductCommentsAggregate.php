<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Product CommentsAggregate class.
 * The CommentsAggregate information of API products will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductCommentsAggregate::getTotal()
 * @see ProductCommentsAggregate::getRating()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class ProductCommentsAggregate {
    use ElementTrait;

    protected float $total = 0.0;

    protected float $rating = 0.0;

    /**
     * Returns the total comments.
     *
     * @return float
     */
    public function getTotal(): float {
        return $this->total;
    }

    /**
     * Returns the aggregate rating.
     *
     * @return float
     */
    public function getRating(): float {
        return $this->rating;
    }

}
