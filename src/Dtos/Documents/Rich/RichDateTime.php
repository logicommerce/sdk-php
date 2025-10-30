<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich date time class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDateTime::getDate()
 * @see RichDateTime::getTime()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDateTime extends Element{
    use ElementTrait;

    protected string $date = '';

    protected string $time = '';

    /**
     * Returns the rich date time date.
     *
     * @return string
     */
    public function getDate(): string {
        return $this->date;
    }

    /**
     * Returns the rich date time time.
     *
     * @return string
     */
    public function getTime(): string {
        return $this->time;
    }
    
}
