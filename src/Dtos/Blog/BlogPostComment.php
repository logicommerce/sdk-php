<?php

namespace SDK\Dtos\Blog;

use SDK\Core\Dtos\Comment;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\DateAddedTrait;

/**
 * This is the blog post comment class.
 * The information of API blog post comments will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BlogPostComment::getEmail()
 *
 * @see Comment
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see DateAddedTrait
 *
 * @package SDK\Dtos\Blog
 */
class BlogPostComment extends Comment {
    use ElementTrait, IdentifiableElementTrait, DateAddedTrait;

    protected string $email = '';

    /**
     * Returns the blog post comment email.
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }
}
