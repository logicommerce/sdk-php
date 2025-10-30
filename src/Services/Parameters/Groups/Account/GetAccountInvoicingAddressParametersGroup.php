<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Account\GetAccountInvoicingAddressParametersValidator;

/**
 * This is the account invoicing address parameters group class.
 * 
 * @package SDK\Services\Parameters\Groups\Account
 */
class GetAccountInvoicingAddressParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): GetAccountInvoicingAddressParametersValidator {
        return new GetAccountInvoicingAddressParametersValidator();
    }
}
