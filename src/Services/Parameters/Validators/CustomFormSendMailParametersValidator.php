<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the form model (send custom form mail) parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class CustomFormSendMailParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['to', 'subject', 'body', 'mailAccountPId'];

    protected function validateTo($to): ?bool {
        return $this->validateString($to);
    }

    protected function validateCc($cc): ?bool {
        return $this->validateArray($cc);
    }

    protected function validateBcc($bcc): ?bool {
        return $this->validateArray($bcc);
    }

    protected function validateSubject($subject): ?bool {
        return $this->validateString($subject);
    }

    protected function validateBody($body): ?bool {
        return $this->validateString($body);
    }

    protected function validateMailAccountPId($mailAccountPId): ?bool {
        return $this->validateString($mailAccountPId);
    }

    protected function validateAttachments($attachments): ?bool {
        if (is_null($this->validateArray($attachments)) || count($attachments) === 0) {
            return null;
        }
        return true;
    }
}
