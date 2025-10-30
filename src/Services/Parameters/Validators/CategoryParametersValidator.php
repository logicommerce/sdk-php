<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CatalogItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\FilterIndexableParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\QParametersValidatorTrait;
use SDK\Enums\CategorySort;

/**
 * This is the category parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class CategoryParametersValidator extends ParametersValidator {
    use CatalogItemsParametersValidatorTrait,
        IdentifiableItemsParametersValidatorTrait,
        PaginableItemsParametersValidatorTrait,
        QParametersValidatorTrait,
        FilterIndexableParametersValidatorTrait;

    protected function validateParentId($parentId): ?bool {
        return $this->validateId($parentId);
    }

    protected function validateParentIdList($parentIdList): ?bool {
        return $this->validateIdList($parentIdList);
    }

    protected function validateParentPId($parentPId): ?bool {
        return $this->validatePId($parentPId);
    }

    protected function validateAreaId($areaId): ?bool {
        return $this->validateId($areaId);
    }

    protected function validateAreaIdList($areaIdList): ?bool {
        return $this->validateIdList($areaIdList);
    }

    protected function validateAreaPId($areaPId): ?bool {
        return $this->validatePId($areaPId);
    }

    protected function validateAreaPosition($areaPosition): ?bool {
        if (is_numeric($areaPosition)) {
            return is_null(filter_var($areaPosition, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE)) ? null : true;
        }
        return null;
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, CategorySort::class);
    }

}
