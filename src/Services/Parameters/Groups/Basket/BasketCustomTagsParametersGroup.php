<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\BasketCustomTagsParametersValidator;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;

/**
 * This is the basket model (get custom tags resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class BasketCustomTagsParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): BasketCustomTagsParametersValidator {
        return new BasketCustomTagsParametersValidator();
    }
}
