<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Services\Parameters\Validators\Basket\EditLinkedParametersValidator;

/**
 * This is the basket model (edit linked resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class EditLinkedParametersGroup extends ProductParametersGroup {

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): EditLinkedParametersValidator {
        return new EditLinkedParametersValidator();
    }
}
