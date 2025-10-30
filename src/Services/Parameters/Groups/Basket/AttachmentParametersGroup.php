<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\AttachmentParametersValidator;

/**
 * This is the Attachment parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class AttachmentParametersGroup extends ParametersGroup {

    protected string $path;

    /**
     * Sets the path parameter for this parameters group.
     *
     * @param string $path
     *
     * @return void
     */
    public function setPath(string $path): void {
        $this->path = $path;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AttachmentParametersValidator {
        return new AttachmentParametersValidator();
    }
}
