<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Blog;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CatalogItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\BlogPostCommentsSort;

/**
 * This is the blog category parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Blog
 */
class BlogPostCommentsParametersValidator extends ParametersValidator {
    use CatalogItemsParametersValidatorTrait,
        IdentifiableItemsParametersValidatorTrait,
        PaginableItemsParametersValidatorTrait;

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, BlogPostCommentsSort::class);
    }

    protected function validateShowAllLanguages($showAllLanguages): ?bool {
        return $this->validateBoolean($showAllLanguages);
    }
}
