<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;

/**
 * This is the get account invoicing address parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class GetAccountInvoicingAddressParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;
}
