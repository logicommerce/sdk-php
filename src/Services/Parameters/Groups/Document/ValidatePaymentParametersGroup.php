<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Document;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Document\ValidatePaymentParametersValidator;

/**
 * This is the validate payment parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Document
 */
class ValidatePaymentParametersGroup extends ParametersGroup {

    protected array $params;

    protected string $body;

    /**
     * Sets the params parameter for this parameters group.
     *
     * @param array $params
     *
     * @return void
     */
    public function setParams(array $params): void {
        $this->params = $params;
    }

    /**
     * Sets the body parameter for this parameters group.
     *
     * @param string $body
     *
     * @return void
     */
    public function setBody(string $body): void {
        $this->body = $body;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): ValidatePaymentParametersValidator {
        return new ValidatePaymentParametersValidator();
    }
}
