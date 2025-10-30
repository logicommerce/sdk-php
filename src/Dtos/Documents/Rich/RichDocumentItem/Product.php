<?php

namespace SDK\Dtos\Documents\Rich\RichDocumentItem;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\Rich\RichDocumentItem;

/**
 * This is the rich product item class.
 * the product item will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentItem
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich\RichDocumentItem
 */
class Product extends RichDocumentItem {
    use ElementTrait;

}
