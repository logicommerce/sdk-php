<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Product;

use SDK\Core\Services\Parameters\Groups\Traits\IdentifiableItemsParametersGroupTrait;
use SDK\Services\Parameters\Groups\Basket\BundleParametersGroup;
use SDK\Services\Parameters\Validators\Product\GetBundleDefinitionsGroupingsCombinationDataParametersValidator;

/**
 * This is the get bundle definitions groupings current data parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Product
 */
class GetBundleDefinitionsGroupingsCombinationDataParametersGroup extends BundleParametersGroup {
    use IdentifiableItemsParametersGroupTrait;

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): GetBundleDefinitionsGroupingsCombinationDataParametersValidator {
        return new GetBundleDefinitionsGroupingsCombinationDataParametersValidator();
    }
}
