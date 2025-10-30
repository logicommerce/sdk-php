<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Product;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\EmailParametersValidatorTrait;

/**
 * This is the query product parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Product
 */
class QueryParametersValidator extends ParametersValidator {
    use EmailParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['name', 'email', 'comment'];

    protected function validateName($name): ?bool {
        return $this->validateString($name);
    }

    protected function validateComment($comment): ?bool {
        return $this->validateString($comment);
    }

    protected function validatePhone($phone): ?bool {
        return $this->validateString($phone, 0);
    }
}
