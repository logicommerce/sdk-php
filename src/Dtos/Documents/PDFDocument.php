<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the PDF document class.
 * The Base64 PDF document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PDFDocument::getContent()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents
 */
final class PDFDocument extends Element {
    use ElementTrait;

    protected string $content = '';

    /**
     * Returns the Base64 PDF document.
     *
     * @return string
     */
    public function getContent(): string {
        return $this->content;
    }
}
