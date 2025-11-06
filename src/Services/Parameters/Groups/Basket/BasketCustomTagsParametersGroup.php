<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Enums\CustomTagType;
use SDK\Services\Parameters\Groups\CustomTagsParametersGroup;
use SDK\Services\Parameters\Validators\CustomTagsParametersValidator;

/**
 * This is the basket model (get custom tags resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class BasketCustomTagsParametersGroup extends CustomTagsParametersGroup {

    protected string $type = CustomTagType::ORDER;

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CustomTagsParametersValidator {
        return new CustomTagsParametersValidator();
    }
}
