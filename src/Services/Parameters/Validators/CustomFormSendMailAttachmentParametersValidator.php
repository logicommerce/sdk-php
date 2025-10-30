<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the form model (send custom form mail attachment resource) parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class CustomFormSendMailAttachmentParametersValidator extends ParametersValidator {

    protected function validateFileName($fileName): ?bool {
        return $this->validateString($fileName);
    }

    protected function validateData($data): ?bool {
        return $this->validateString($data);
    }

}
