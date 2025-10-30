<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use \SDK\Core\Services\Parameters\Validators\Traits\EmailParametersValidatorTrait;

/**
 * This is the basket edit pro  duct options parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class BasketVoucherPurchaseRecipientParameterValidator extends ParametersValidator {
    use EmailParametersValidatorTrait;
  
    protected function validateMessage($message): ?bool {
        return $this->validateString($message, 0);
    }
}
