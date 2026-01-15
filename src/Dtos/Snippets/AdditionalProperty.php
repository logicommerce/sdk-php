<?php

namespace SDK\Dtos\Snippets;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich snippets additional property section class.
 * The rich snippets additional property section will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AdditionalProperty::getName()
 * @see AdditionalProperty::getValue()
 *
 * @see RichSnippets
 * @see ElementTrait
 *
 * @package SDK\Dtos\Snippets
 */
class AdditionalProperty extends RichSnippets
{
    use ElementTrait;

    protected string $name = '';

    protected string $value = '';

    /**
     * Returns the rich snippet offer name.
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns the rich snippet offer value.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
