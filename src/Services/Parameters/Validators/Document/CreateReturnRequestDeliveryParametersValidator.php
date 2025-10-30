<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Document;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Enums\DeliveryType;

/**
 * This is the document item validation class.
 *
 * @package SDK\Services\Parameters\Validators\Document
 */
class CreateReturnRequestDeliveryParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['itemId', 'type'];

    protected function validateItemId($itemId): ?bool {
        if ($this->validateNumeric($itemId) && $itemId >= 0) {
            return true;
        }
        return null;
    }

    protected function validateType($type): ?bool {
        return $this->validateEnumerateValue($type, DeliveryType::class);
    }
}
