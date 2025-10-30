<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;

/**
 * This is the location parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class LinkedParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected function validatePosition($position): ?bool {
        return $this->validateNumeric($position);
    }

    protected function validatePositionList($positionList): ?bool {
        return $this->validateIdList($positionList);
    }

    protected function validateParentPId($parentPId): ?bool {
        return $this->validatePId($parentPId);
    }

    protected function validateLimit($limit): ?bool {
        if (is_null($this->validatePositiveNumeric($limit)) || $limit > 50) {
            return null;
        }
        return true;
    }

}
