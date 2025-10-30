<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;

/**
 * This is the basket comment validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class RewardPointsRedeemParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected const REQUIRED_PARAMS = [ 'id', 'value' ];

    protected function validateValue($value): ?bool {
        return $this->validateNumeric($value);
    }
}
