<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the from date and to date parameters validation trait.
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait FromToDateParametersValidatorTrait {

    protected function validateFromDate($fromDate): ?bool {
        return $this->validateDate($fromDate);
    }

    protected function validateToDate($toDate): ?bool {
        return $this->validateDate($toDate);
    }

}
