<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the UpdateLockedStockTimer ParametersValidator class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class UpdateLockedStockTimerParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['expiresAtExtendMinutesUponUserRequest'];

    protected function validateExpiresAtExtendMinutes($expiresAtExtendMinutes): ?bool {
        return $this->validateZeroOrPositiveNumeric($expiresAtExtendMinutes);
    }

    protected function validateExpiresAtExtendMinutesUponUserRequest($expiresAtExtendMinutesUponUserRequest): ?bool {
        return $this->validateBoolean($expiresAtExtendMinutesUponUserRequest);
    }
}
