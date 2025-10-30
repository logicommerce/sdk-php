<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\Traits\IdentifiableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Basket\AddBundleParametersValidator;

/**
 * This is the basket model (add bundle resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class AddBundleParametersGroup extends BundleParametersGroup {
    use IdentifiableItemsParametersGroupTrait;

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AddBundleParametersValidator {
        return new AddBundleParametersValidator();
    }
}
