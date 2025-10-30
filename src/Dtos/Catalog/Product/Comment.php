<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Comment as CoreComment;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\DateAddedTrait;

/**
 * This is the comment class.
 * The product comments will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Comment::getRate()
 *
 * @see CoreComment
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see DateAddedTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class Comment extends CoreComment {
    use ElementTrait, IdentifiableElementTrait, DateAddedTrait;

    protected int $rating = 0;

    /**
     * Returns the comment's punctuation.
     *
     * @return int
     */
    public function getRating(): int {
        return $this->rating;
    }

}
