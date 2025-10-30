<?php

declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the paginable items main parameters validation trait.
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait PaginableItemsParametersValidatorTrait {

    protected function validatePage($page): ?bool {
        return $this->validatePositiveNumeric($page);
    }

    protected function validatePerpage($perPage): ?bool {
        if (is_null($this->validatePositiveNumeric($perPage)) || $perPage > 100) {
            return null;
        }
        return true;
    }
}
