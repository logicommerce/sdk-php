<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Product;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\CommentsSort;

/**
 * This is the product comments parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Product
 */
class CommentsParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;

    protected function validateShowAllLanguages($showAllLanguages): ?bool {
        return $this->validateBoolean($showAllLanguages);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, CommentsSort::class);
    }
}
