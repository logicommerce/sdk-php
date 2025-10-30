<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Account\GetAccountShippingAddressParametersValidator;

/**
 * This is the account shipping address parameters group class.
 * 
 * @package SDK\Services\Parameters\Groups\Account
 */
class GetAccountShippingAddressParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): GetAccountShippingAddressParametersValidator {
        return new GetAccountShippingAddressParametersValidator();
    }
}
