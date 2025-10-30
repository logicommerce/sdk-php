<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;

/**
 * This is the basket payment system validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class PaymentSystemParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected const REQUIRED_PARAMS = [ 'id' ];

    protected function validateProperty($property): ?bool {
        return $this->validateString($property,0);
    }

    protected function validateAdditionalData($additionalData): ?bool {
        return $this->validateAssociativeArray($additionalData);
    }
}
