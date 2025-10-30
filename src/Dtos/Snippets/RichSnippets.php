<?php

namespace SDK\Dtos\Snippets;

use SDK\Core\Dtos\Element;

/**
 * This is the rich snippets class.
 * The rich snippets will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductRichSnippets::getContext()
 * @see ProductRichSnippets::getType()
 *
 * @see Element
 *
 * @package SDK\Dtos\Snippets
 */
abstract class RichSnippets extends Element {

    protected string $context = '';

    protected string $type = '';

    /**
     * Returns the rich snippet context.
     *
     * @return string
     */
    public function getContext(): string {
        return $this->context;
    }

    /**
     * Returns the rich snippet type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }
}
