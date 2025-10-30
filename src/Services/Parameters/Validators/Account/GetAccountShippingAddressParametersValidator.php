<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Account;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;

/**
 * This is the get account shipping address parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Account
 */
class GetAccountShippingAddressParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;
}
