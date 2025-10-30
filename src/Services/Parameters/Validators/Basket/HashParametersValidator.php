<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the basket edit/delete product hash validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class HashParametersValidator extends ParametersValidator {

    protected function validateHash($hash): ?bool {
        return $this->validateString($hash);
    }
}
