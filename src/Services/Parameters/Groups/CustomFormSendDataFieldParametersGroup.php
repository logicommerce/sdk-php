<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\CustomFormSendDataFieldParametersValidator;

/**
 * This is the form model (send custom form data field) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class CustomFormSendDataFieldParametersGroup extends ParametersGroup {

    protected string $value;

    protected string $name;

    /**
     * Sets the value parameter for this parameters group.
     *
     * @param string $value
     *
     * @return void
     */
    public function setValue(string $value): void {
        $this->value = $value;
    }

    /**
     * Sets the name parameter for this parameters group.
     *
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CustomFormSendDataFieldParametersValidator {
        return new CustomFormSendDataFieldParametersValidator();
    }
}
