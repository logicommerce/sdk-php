<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\EditProductParametersValidator;

/**
 * This is the basket model (edit product resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class EditProductParametersGroup extends ProductParametersGroup {

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): EditProductParametersValidator {
        return new EditProductParametersValidator();
    }
}
