<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Blog;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CatalogItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\QParametersValidatorTrait;
use SDK\Enums\BlogCategorySort;

/**
 * This is the blog category parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Blog
 */
class BlogCategoryParametersValidator extends ParametersValidator {
    use CatalogItemsParametersValidatorTrait,
        IdentifiableItemsParametersValidatorTrait,
        PaginableItemsParametersValidatorTrait,
        QParametersValidatorTrait;

    protected function validateParentId($parentId): ?bool {
        return $this->validateId($parentId);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, BlogCategorySort::class);
    }
}
