<?php

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\CoordinateParametersValidatorTrait;

/**
 * This is the coordinate parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class CoordinateParametersValidator extends ParametersValidator {
    use CoordinateParametersValidatorTrait;
}
