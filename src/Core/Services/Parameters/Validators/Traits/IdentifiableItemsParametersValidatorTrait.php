<?php

declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the identificable items parameters validation trait.
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait IdentifiableItemsParametersValidatorTrait {

    protected function validateId($id): ?bool {
        return $this->validatePositiveNumeric($id);
    }

    protected function validatePId($pId): ?bool {
        if (is_string($pId)) {
            return true;
        }
        return null;
    }

    protected function validateIdList($idList): ?bool {
        if (is_null($this->validateNumericList($idList))) {
            return null;
        }
        $ids = explode(',', $idList);
        foreach ($ids as $id) {
            $value = $this->validateId($id);
            if (is_null($value)) {
                return null;
            }
        }
        return true;
    }
}
