<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\BundleDefinitionsParametersValidator;

/**
 * This is the BundleDefinitions model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class BundleDefinitionsParametersGroup extends ParametersGroup {
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
    protected function getValidator(): BundleDefinitionsParametersValidator {
        return new BundleDefinitionsParametersValidator();
    }
}
