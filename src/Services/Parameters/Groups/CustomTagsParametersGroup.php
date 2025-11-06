<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\CustomTagsParametersValidator;

/**
 * This is the model (get custom tags resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class CustomTagsParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    protected string $type;

    protected string $sort;

    /**
     * Sets the data validation type parameter for this parameters group.
     *
     * @param string $type
     *
     * @return void
     */
    public function setType(string $type): void {
        $this->type = $type;
    }

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
    protected function getValidator(): CustomTagsParametersValidator {
        return new CustomTagsParametersValidator();
    }
}
