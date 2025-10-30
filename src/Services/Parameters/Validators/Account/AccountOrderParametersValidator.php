<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\FromToDateParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\OrderSort;

/**
 * This is the update account parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class AccountOrderParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;

    protected function validateOnlyCreatedByMe($onlyCreatedByMe): ?bool {
        return $this->validateBoolean($onlyCreatedByMe);
    }

    protected function validateStatusIdList($statusIdList): ?bool {
        return $this->validateString($statusIdList);
    }

    protected function validateIncludeSubCompanyStructure($includeSubCompanyStructure): ?bool {
        return $this->validateBoolean($includeSubCompanyStructure);
    }

    protected function validateAddedFrom($addedFrom): ?bool {
        return $this->validateDate($addedFrom);
    }

    protected function validateAddedTo($addedTo): ?bool {
        return $this->validateDate($addedTo);
    }

    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, OrderSort::class);
    }
}
