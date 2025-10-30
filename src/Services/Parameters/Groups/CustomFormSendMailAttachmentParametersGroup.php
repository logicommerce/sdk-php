<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\CustomFormSendMailAttachmentParametersValidator;

/**
 * This is the form model (send custom form mail attachemnt) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class CustomFormSendMailAttachmentParametersGroup extends ParametersGroup {

    protected string $data;

    protected string $fileName;

    /**
     * Sets the data parameter for this parameters group.
     *
     * @param string $data
     *
     * @return void
     */
    public function setData(string $data): void {
        $this->data = $data;
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
    protected function getValidator(): CustomFormSendMailAttachmentParametersValidator {
        return new CustomFormSendMailAttachmentParametersValidator();
    }
}
