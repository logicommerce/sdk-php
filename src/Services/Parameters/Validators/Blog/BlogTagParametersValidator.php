<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Blog;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CatalogItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\BlogTagSort;

/**
 * This is the blog post rate parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Blog
 */
class BlogTagParametersValidator extends ParametersValidator {
    use CatalogItemsParametersValidatorTrait, IdentifiableItemsParametersValidatorTrait, PaginableItemsParametersValidatorTrait;

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, BlogTagSort::class);
    }
}
