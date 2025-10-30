<?php

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Enums\AddProductsMode;

/**
 * This is the basket add product parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class AddVoucherPurchaseParametersValidator extends AddProductParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, ProductParametersValidatorTrait;

    protected function validateRecipients($recipients): ?bool {
    if (!is_array($recipients)) {
        return null;
    }
    return true;
    }
}
