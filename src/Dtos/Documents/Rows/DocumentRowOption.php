<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the document row option class.
 * The document row options will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentRowOption::getSku()
 * @see DocumentRowOption::getPrompt()
 * @see DocumentRowOption::getOptionId()
 * @see DocumentRowOption::getOptionPId()
 * @see DocumentRowOption::getValue()
 *
 * @see Element
 * @see ElementNameTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos\Documents\Rows
 */
abstract class DocumentRowOption extends Element {
    use ElementNameTrait, IdentifiableElementTrait;

    protected string $sku = '';

    protected string $prompt = '';

    protected int $optionId = 0;

    protected string $optionPId = '';

    protected string $value = '';

    /**
     * Returns product reference code.
     *
     * @return string
     */
    public function getSku(): string {
        return $this->sku;
    }

    /**
     * Returns message intended to display in the presentation layer.
     *
     * @return string
     */
    public function getPrompt(): string {
        return $this->prompt;
    }

    /**
     * Returns internal identifier of the option.
     *
     * @return int
     */
    public function getOptionId(): int {
        return $this->optionId;
    }

    /**
     * Returns internal identifier of the option.
     *
     * @return string
     */
    public function getOptionPId(): string {
        return $this->optionPId;
    }

    /**
     * Option value for the returned language.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }
}
