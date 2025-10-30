<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CatalogItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\BannerSort;

/**
 * This is the banner parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class BannerParametersValidator extends ParametersValidator {
    use CatalogItemsParametersValidatorTrait,
        IdentifiableItemsParametersValidatorTrait,
        PaginableItemsParametersValidatorTrait;

    protected function validatePosition($position): ?bool {
        return $this->validateNumeric($position);
    }

    protected function validatePositionList($positionList): ?bool {
        return $this->validateNumericList($positionList);
    }

    protected function validateLimited($limited): ?bool {
        return $this->validateBoolean($limited);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, BannerSort::class);
    }
}
