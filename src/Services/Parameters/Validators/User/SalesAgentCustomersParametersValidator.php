<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\FromToDateParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\QParametersValidatorTrait;

/**
 * This is the sales agent customers parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class SalesAgentCustomersParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait, QParametersValidatorTrait, FromToDateParametersValidatorTrait;

        protected function validateIncludeSubordinates($includeSubordinates): ?bool {
        return $this->validateBoolean($includeSubordinates);
    }
}
