<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Product;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the product reward points parameters validator class.
 *
 * @package SDK\Services\Parameters\Validators\Product
 */
class ProductRewardPointsParametersValidator extends ParametersValidator {

    protected function validateQuantity($quantity): ?bool {
        return $this->validatePositiveNumeric($quantity);
    }
}
