<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\UpdateLockedStockTimerParametersValidator;

/**
 * This is the validate express checkout parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class UpdateLockedStockTimerParametersGroup extends ParametersGroup {

    protected int $expiresAtExtendMinutes;

    protected bool $expiresAtExtendMinutesUponUserRequest;

    /**
     * Sets the quantity of minutes you want to extend the expiration time of the indicated locked stock timer.
     *
     * @param int $expiresAtExtendMinutes
     *
     * @return void
     */
    public function setExpiresAtExtendMinutes(int $expiresAtExtendMinutes): void {
        $this->expiresAtExtendMinutes = $expiresAtExtendMinutes;
    }

    /**
     * Specifies whether the update to extend the expiration time has been requested upon a user request. It is necessary to specify it in order to be able to control the 'lockedStockTimerExtendibleByUser' basketStockLocking setting.
     *
     * @param bool $expiresAtExtendMinutesUponUserRequest
     *
     * @return void
     */
    public function setExpiresAtExtendMinutesUponUserRequest(bool $expiresAtExtendMinutesUponUserRequest): void {
        $this->expiresAtExtendMinutesUponUserRequest = $expiresAtExtendMinutesUponUserRequest;
    }

    /**
     *      * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): UpdateLockedStockTimerParametersValidator {
        return new UpdateLockedStockTimerParametersValidator();
    }
}
