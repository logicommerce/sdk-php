<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Resources\Date;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\FromToDateParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\SortableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Account\AccountOrderParametersValidator;
use SDK\Services\Parameters\Validators\Account\DeleteAccountParametersValidator;

/**
 * This is the account model (orders resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class DeleteAccountParametersGroup extends ParametersGroup {

    protected string $password;

    /**
     * Sets the password parameter for this parameters group.
     *
     * @param string $password
     *
     * @return void
     */
    public function setPassword(string $password): void {
        $this->password = $password;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): DeleteAccountParametersValidator {
        return new DeleteAccountParametersValidator();
    }
}
