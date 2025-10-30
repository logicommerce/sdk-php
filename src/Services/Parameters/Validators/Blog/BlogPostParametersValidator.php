<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Blog;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CatalogItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\QParametersValidatorTrait;
use SDK\Enums\BlogPostSort;

/**
 * This is the blog post rate parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Blog
 */
class BlogPostParametersValidator extends ParametersValidator {
    use CatalogItemsParametersValidatorTrait,
        IdentifiableItemsParametersValidatorTrait,
        PaginableItemsParametersValidatorTrait,
        QParametersValidatorTrait;

    protected function validateCategoryId($categoryId): ?bool {
        return $this->validateId($categoryId);
    }

    protected function validateBloggerId($bloggerId): ?bool {
        return $this->validateId($bloggerId);
    }

    protected function validateTagId($tagId): ?bool {
        return $this->validateId($tagId);
    }

    protected function validateFromDate($fromDate): ?bool {
        return $this->validateDate($fromDate);
    }

    protected function validateToDate($toDate): ?bool {
        return $this->validateDate($toDate);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, BlogPostSort::class);
    }
}
