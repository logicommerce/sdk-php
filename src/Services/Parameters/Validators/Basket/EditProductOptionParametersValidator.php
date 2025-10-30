<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;

/**
 * This is the basket edit product options parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class EditProductOptionParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected const REQUIRED_PARAMS = [ 'values' ];

    protected function validateValues($values): ?bool {
        if (is_null($this->validateArray($values)) || count($values) === 0) {
            return null;
        }
        return true;
    }
}
