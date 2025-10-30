<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the data text class.
 * The API data texts will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DataText::getText()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class DataText extends Element {
    use ElementTrait;

    protected string $text = '';

    /**
     * Returns the text.
     *
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }
}
