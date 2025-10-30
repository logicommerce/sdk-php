<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the OpeningTime validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class OpeningTimeParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['startTime', 'endTime'];

    protected function validateStartTime($startTime): ?bool {
        return $this->validateString($startTime);
    }

    protected function validateEndTime($endTime): ?bool {
        return $this->validateString($endTime);
    }
}
