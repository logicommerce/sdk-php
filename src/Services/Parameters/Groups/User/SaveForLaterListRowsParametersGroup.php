<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\SaveForLaterListRowsParametersValidator;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;

/**
 * This is the save for later list rows parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class SaveForLaterListRowsParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    protected string $sort;

    /**
     * Sets the sort criteria parameter for this parameters group.
     *
     * @param string $sort
     *
     * @return void
     */
    public function setSort(string $sort): void {
        $this->sort = $sort;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): SaveForLaterListRowsParametersValidator {
        return new SaveForLaterListRowsParametersValidator();
    }
}
