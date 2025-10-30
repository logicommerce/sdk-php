<?php

namespace SDK\Dtos\Snippets;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the rich snippets person section class.
 * The rich snippets person section will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichSnippets
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Snippets
 */
class Person extends RichSnippets {
    use ElementTrait, ElementNameTrait;
}
