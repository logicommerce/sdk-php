<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CatalogItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\FilterIndexableParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\QParametersValidatorTrait;
use SDK\Enums\PageSort;
use SDK\Enums\PageType;

/**
 * This is the page parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class PageParametersValidator extends ParametersValidator {
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

    protected function validatePagesGroupId($pagesGroupId): ?bool {
        return $this->validateId($pagesGroupId);
    }

    protected function validatePagesGroupIdList($pagesGroupIdList): ?bool {
        return $this->validateIdList($pagesGroupIdList);
    }

    protected function validatePagesGroupPId($pagesGroupPId): ?bool {
        return $this->validatePId($pagesGroupPId);
    }

    protected function validatePosition($position): ?bool {
        return $this->validateNumeric($position);
    }

    protected function validatePositionList($positionList): ?bool {
        return $this->validateNumericList($positionList);
    }

    protected function validatePageType($pageType): ?bool {
        return $this->validateEnumerateValue($pageType, PageType::class);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, PageSort::class);
    }

    protected function validateLevels($levels): ?bool {
        if (is_numeric($levels) && filter_var($levels, FILTER_VALIDATE_INT) !== false) {
            return true;
        }
        return null;
    }
}
