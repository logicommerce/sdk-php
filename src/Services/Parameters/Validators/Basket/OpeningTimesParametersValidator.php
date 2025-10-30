<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Services\Parameters\Groups\Basket\OpeningTimeParametersGroup;

/**
 * This is the OpeningTime validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class OpeningTimesParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

    protected function validateMonday($monday): ?bool {
        if (is_array($monday)) {
            if (empty($sunday)) {
                return true;
            }
            (new OpeningTimeParametersValidator())->validate($monday);
            return true;
        }
        return $this->validateItemsClass([$monday], OpeningTimeParametersGroup::class);
    }

    protected function validateTuesday($tuesday): ?bool {
        if (is_array($tuesday)) {
            if (empty($sunday)) {
                return true;
            }
            (new OpeningTimeParametersValidator())->validate($tuesday);
            return true;
        }
        return $this->validateItemsClass([$tuesday], OpeningTimeParametersGroup::class);
    }

    protected function validateWednesday($wednesday): ?bool {
        if (is_array($wednesday)) {
            if (empty($sunday)) {
                return true;
            }
            (new OpeningTimeParametersValidator())->validate($wednesday);
            return true;
        }
        return $this->validateItemsClass([$wednesday], OpeningTimeParametersGroup::class);
    }

    protected function validateThursday($thursday): ?bool {
        if (is_array($thursday)) {
            if (empty($sunday)) {
                return true;
            }
            (new OpeningTimeParametersValidator())->validate($thursday);
            return true;
        }
        return $this->validateItemsClass([$thursday], OpeningTimeParametersGroup::class);
    }

    protected function validateFriday($friday): ?bool {
        if (is_array($friday)) {
            if (empty($sunday)) {
                return true;
            }
            (new OpeningTimeParametersValidator())->validate($friday);
            return true;
        }
        return $this->validateItemsClass([$friday], OpeningTimeParametersGroup::class);
    }

    protected function validateSaturday($saturday): ?bool {
        if (is_array($saturday)) {
            if (empty($sunday)) {
                return true;
            }
            (new OpeningTimeParametersValidator())->validate($saturday);
            return true;
        }
        return $this->validateItemsClass([$saturday], OpeningTimeParametersGroup::class);
    }

    protected function validateSunday($sunday): ?bool {
        if (is_array($sunday)) {
            if (empty($sunday)) {
                return true;
            }
            (new OpeningTimeParametersValidator())->validate($sunday);
            return true;
        }
        return $this->validateItemsClass([$sunday], OpeningTimeParametersGroup::class);
    }
}
