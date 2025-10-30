<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Services\Parameters\Groups\Account\MasterUpdateParametersGroup;

class UpdateAccountParametersValidator extends AccountParametersValidator {
    protected function validateMaster($master): ?bool {
        if (is_array($master)) {
            (new MasterUpdateParametersValidator())->validate($master);
            return true;
        }
        return $this->validateItemsClass([$master], MasterUpdateParametersGroup::class);
    }

    protected function validateParentAccountId($parentAccountId): ?bool {
        return $this->validateId($parentAccountId);
    }

    protected function validateSegmentationInheritanceAccountId($segmentationInheritanceAccountId): ?bool {
        return $this->validateId($segmentationInheritanceAccountId);
    }

    protected function validateDescription($description): ?bool {
        return $this->validateString($description, 0);
    }

    protected function validateCache($cache): ?bool {
        return $this->validateString($cache, 0);
    }
}
