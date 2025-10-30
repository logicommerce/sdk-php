<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\PaginableParametersValidator;

/**
 * This is the paginable model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class PaginableParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): PaginableParametersValidator {
        return new PaginableParametersValidator();
    }
}
