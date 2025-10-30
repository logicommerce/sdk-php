<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

use SDK\Enums\FilterIndexableType;

/**
 * This is the filter indexable parameters validation trait.
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait FilterIndexableParametersValidatorTrait {

    protected function validateFilterIndexable($filterIndexable): ?bool {
        return $this->validateEnumerateValue($filterIndexable, FilterIndexableType::class);
    }

}
