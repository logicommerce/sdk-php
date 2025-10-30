<?php

namespace SDK\Dtos\Documents\Rich\RichDocumentItem;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\Rich\RichDocumentItem;

/**
 * This is the rich gift item class.
 * the gift item will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentItem
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich\RichDocumentItem
 */
class Gift extends RichDocumentItem {
    use ElementTrait;

}
