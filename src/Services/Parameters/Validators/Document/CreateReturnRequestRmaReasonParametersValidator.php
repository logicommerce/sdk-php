<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Document;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Enums\DeliveryType;

/**
 * This is the Create Return Request RmaReason Parameters Validator validation class.
 *
 * @package SDK\Services\Parameters\Validators\Document
 */
class CreateReturnRequestRmaReasonParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['id'];

    protected function validateComment($comment): ?bool {
        return $this->validateString($comment, 0);
    }
}
