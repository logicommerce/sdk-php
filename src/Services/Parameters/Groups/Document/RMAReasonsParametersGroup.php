<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Document;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Document\RMAReasonsParametersValidator;

/**
 * This is the Document model (RMAReasons resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Document
 */
class RMAReasonsParametersGroup extends ParametersGroup {
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
    protected function getValidator(): RMAReasonsParametersValidator {
        return new RMAReasonsParametersValidator();
    }
}
