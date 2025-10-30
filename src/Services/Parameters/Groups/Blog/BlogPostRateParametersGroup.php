<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Blog;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Blog\BlogPostRateParametersValidator;

/**
 * This is the blog model (rate post resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Blog
 */
class BlogPostRateParametersGroup extends ParametersGroup {

    protected int $rating;

    /**
     * Sets the rating parameter for this parameters group.
     *
     * @param int $rating
     *
     * @return void
     */
    public function setRating(int $rating): void {
        $this->rating = $rating;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): BlogPostRateParametersValidator {
        return new BlogPostRateParametersValidator();
    }
}
