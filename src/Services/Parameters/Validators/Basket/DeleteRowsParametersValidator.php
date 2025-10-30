<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the delete rows parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class DeleteRowsParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = [ 'hashes' ];

    protected function validateHashes($hashes): ?bool {
        if (is_null($this->validateArray($hashes)) || count($hashes) === 0) {
            return null;
        }
        return true;
    }
}
