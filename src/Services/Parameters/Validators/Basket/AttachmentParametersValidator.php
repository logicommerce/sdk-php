<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the Attachment Parameters comment validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class AttachmentParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['path'];

    protected function validatePath($path): ?bool {
        return $this->validateString($path);
    }
}
