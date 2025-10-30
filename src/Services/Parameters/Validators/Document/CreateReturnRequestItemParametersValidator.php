<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Document;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Services\Parameters\Groups\Document\CreateReturnRequestRmaReasonParametersGroup;

/**
 * This is the document item validation class.
 *
 * @package SDK\Services\Parameters\Validators\Document
 */
class CreateReturnRequestItemParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['hash', 'quantity'];

    protected function validateHash($hash): ?bool {
        return $this->validateString($hash);
    }

    protected function validateQuantity($quantity): ?bool {
        return $this->validatePositiveNumeric($quantity);
    }

    protected function validateRmaReason($rmaReason): ?bool {
        if ($rmaReason instanceof CreateReturnRequestRmaReasonParametersGroup) {
            $rmaReason = $rmaReason->toArray();
        }
        (new CreateReturnRequestRmaReasonParametersValidator())->validate($rmaReason);
        return true;
    }
}
