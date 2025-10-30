<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CatalogItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\FilterIndexableParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\AreaSort;

/**
 * This is the area parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class AreaParametersValidator extends ParametersValidator {
    use CatalogItemsParametersValidatorTrait,
        IdentifiableItemsParametersValidatorTrait,
        PaginableItemsParametersValidatorTrait,
        FilterIndexableParametersValidatorTrait;

    protected function validatePosition($position): ?bool {
        return $this->validateNumeric($position);
    }

    protected function validatePositionList($positionList): ?bool {
        return $this->validateNumericList($positionList);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, AreaSort::class);
    }

}
