<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Services\Parameters\Validators\Basket\EditBundleParametersValidator;

/**
 * This is the basket model (edit bundle resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class EditBundleParametersGroup extends BundleParametersGroup {

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): EditBundleParametersValidator {
        return new EditBundleParametersValidator();
    }
}
