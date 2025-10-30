<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the validate express checkout parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class ExpressCheckoutValidateParametersValidator extends ParametersValidator {

    protected function validateParams($params): ?bool {
        return $this->validateAssociativeArray($params);
    }

    protected function validateBody($body): ?bool {
        return $this->validateString($body,0);
    }
}
