<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the ProductRowPinnedRequestImage Parameters comment validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class ProductRowPinnedRequestImageParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['base64Content', 'extension'];

    protected function validateBase64Content($base64Content): ?bool {
        return $this->validateString($base64Content);
    }

    protected function validateExtension($extension): ?bool {
        return $this->validateString($extension);
    }
}
