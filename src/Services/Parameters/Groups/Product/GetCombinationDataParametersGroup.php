<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Product;

use SDK\Services\Parameters\Groups\Basket\ProductParametersGroup;
use SDK\Services\Parameters\Validators\Product\GetCombinationDataParametersValidator;

/**
 * This is the get current data model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class GetCombinationDataParametersGroup extends ProductParametersGroup {

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): GetCombinationDataParametersValidator {
        return new GetCombinationDataParametersValidator();
    }
}
