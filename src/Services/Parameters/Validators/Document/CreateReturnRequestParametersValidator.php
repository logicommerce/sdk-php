<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Document;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Services\Parameters\Groups\Document\CreateReturnRequestDeliveryParametersGroup;
use SDK\Services\Parameters\Groups\Document\CreateReturnRequestItemParametersGroup;

/**
 * This is the create return request validation class.
 *
 * @package SDK\Services\Parameters\Validators\Document
 */
class CreateReturnRequestParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['items', 'delivery'];

    protected function validateItems($items): ?bool {
        if (!is_array($items) || count($items) === 0) {
            return null;
        }
        foreach ($items as $item) {
            if ($item instanceof CreateReturnRequestItemParametersGroup) {
                $item = $item->toArray();
            }
            (new CreateReturnRequestItemParametersValidator())->validate($item);
        }
        return true;
    }

    protected function validateDelivery($delivery): ?bool {
        if ($delivery instanceof CreateReturnRequestDeliveryParametersGroup) {
            $delivery = $delivery->toArray();
        }
        (new CreateReturnRequestDeliveryParametersValidator())->validate($delivery);
        return true;
    }

    protected function validateComment($comment): ?bool {
        return $this->validateString($comment, 0);
    }
}
