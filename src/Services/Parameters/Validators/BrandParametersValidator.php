<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\FilterIndexableParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\QParametersValidatorTrait;
use SDK\Enums\BrandSort;

/**
 * This is the brand parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class BrandParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait,
        PaginableItemsParametersValidatorTrait,
        QParametersValidatorTrait,
        FilterIndexableParametersValidatorTrait;
    
    protected function validateOnlyActive($onlyActive): ?bool {
        return $this->validateBoolean($onlyActive);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, BrandSort::class);
    }
    
    protected function validateSortByIdList($sortByIdList): ?bool {
        return $this->validateIdList($sortByIdList);
    }

}
