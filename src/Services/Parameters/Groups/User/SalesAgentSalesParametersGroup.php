<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\FromToDateParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\User\SalesAgentSalesParametersValidator;

/**
 * This is the user model (sales agent sales resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class SalesAgentSalesParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait, FromToDateParametersGroupTrait;

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): SalesAgentSalesParametersValidator {
        return new SalesAgentSalesParametersValidator();
    }
}
