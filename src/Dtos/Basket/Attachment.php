<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Attachment class.
 * The Attachments information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Attachment::getAvailableBalance()
 * @see Attachment::getCode()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class Attachment extends Element {
    use ElementTrait;

    protected string $value = '';

    protected string $fileName = '';

    protected string $extension = '';

    /**
     * Data contained in the attachment formated as : data:text/plain;base64,base64OfTheFile.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Name of the attachment.
     *
     * @return string
     */
    public function getFileName(): string {
        return $this->fileName;
    }

    /**
     * Extension of the attachment.
     *
     * @return string
     */
    public function getExtension(): string {
        return $this->extension;
    }
}
