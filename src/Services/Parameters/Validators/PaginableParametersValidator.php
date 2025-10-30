<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;

/**
 * This is the paginable parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class PaginableParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;
}
