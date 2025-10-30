<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\FromToDateParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;

/**
 * This is the sales agent sales parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class SalesAgentSalesParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait, FromToDateParametersValidatorTrait;

}
