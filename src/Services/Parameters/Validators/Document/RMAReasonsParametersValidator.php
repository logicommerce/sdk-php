<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Document;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\RMAReasonsSort;

/**
 * This is the pickup point providers parameters validation class.
 *
 * @uses: SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait
 * @package SDK\Services\Parameters\Validators\Document
 */
class RMAReasonsParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;

    protected const REQUIRED_PARAMS = [];

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, RMAReasonsSort::class);
    }
}
