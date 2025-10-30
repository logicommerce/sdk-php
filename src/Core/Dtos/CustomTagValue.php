<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the Custom Tag Value class.
 * The custom tags values information of API elements will be stored in that class and will remain immutable
 * (only get methods are available)
 *
 * @see CustomTagValue::getCustomTagId()
 * @see CustomTagValue::getValue()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Core\Dtos
 */
class CustomTagValue {
    use ElementTrait, ElementNameTrait;

    protected int $customTagId = 0;

    protected int $position = 0;

    protected string $value = '';

    protected string $customTagPId = '';

    /**
     * Returns the custom tag internal identifier.
     *
     * @return int
     */
    public function getCustomTagId(): int {
        return $this->customTagId;
    }

    /**
     * Returns the custom tag position.
     *
     * @return int
     */
    public function getPosition(): int {
        return $this->position;
    }

    /**
     * Returns the value of the custom tag value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the custom tag public identifier.
     *
     * @return string
     */
    public function getCustomTagPId(): string {
        return $this->customTagPId;
    }
}
