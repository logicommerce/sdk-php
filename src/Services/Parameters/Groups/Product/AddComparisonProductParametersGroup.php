<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Product;

use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\IdentifiableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Product\AddComparisonProductParametersValidator;

/**
 * This is the product model (add comparaison product) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Product
 */
class AddComparisonProductParametersGroup extends ParametersGroup {
    use IdentifiableItemsParametersGroupTrait;

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AddComparisonProductParametersValidator {
        return new AddComparisonProductParametersValidator();
    }
}
