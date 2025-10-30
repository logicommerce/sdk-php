<?php

declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Validators\CustomTagDataParametersValidator;

/**
 * This is the custom tag data parameters group class.
 *
 * @package SDK\Core\Services\Parameters\Groups
 */
class CustomTagDataParametersGroup extends ParametersGroup {

    protected string $value;

    protected string $extension;

    protected string $fileName;

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
     * Sets the extension parameter for this parameters group.
     *
     * @param string $extension
     *
     * @return void
     */
    public function setExtension(string $extension): void {
        $this->extension = $extension;
    }

    /**
     * Sets the fileName parameter for this parameters group.
     *
     * @param string $fileName
     *
     * @return void
     */
    public function setFileName(string $fileName): void {
        $this->fileName = $fileName;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CustomTagDataParametersValidator {
        return new CustomTagDataParametersValidator();
    }
}
