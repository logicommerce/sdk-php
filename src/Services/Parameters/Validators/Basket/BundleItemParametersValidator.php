<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;

/**
 * This is the bundle item parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class BundleItemParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected const REQUIRED_PARAMS = [ 'id' ];

    protected function validateOptions($options): ?bool {
        if (is_null($this->validateArray($options)) || count($options) === 0) {
            return null;
        }
        return true;
    }
}
