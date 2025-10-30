<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\CustomFormSendDataParametersValidator;

/**
 * This is the form model (send custom form data resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class CustomFormSendDataParametersGroup extends ParametersGroup {

    protected string $url;

    protected array $fields;

    /**
     * Sets the send data url parameter for this parameters group.
     *
     * @param string $url
     *
     * @return void
     */
    public function setUrl(string $url): void {
        $this->url = $url;
    }

    /**
     * Sets an array of fields as a parameter for this parameters group.
     *
     * @param CustomFormSendDataFieldParametersGroup[] $fields
     *
     * @return void
     */
    public function setFields(array $fields): void {
        $this->fields = [];
        foreach ($fields as $field) {
            $this->addField($field);
        }
    }

    /**
     * Adds a new field to the array of fields for this parameters group.
     *
     * @param CustomFormSendDataFieldParametersGroup $field
     *
     * @return void
     */
    public function addField(CustomFormSendDataFieldParametersGroup $field): void {
        $this->fields ??= [];
        $this->fields[] = $field;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CustomFormSendDataParametersValidator {
        return new CustomFormSendDataParametersValidator();
    }
}
