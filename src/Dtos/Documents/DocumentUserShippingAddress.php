<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the document user shipping address class.
 * The document user shipping address will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents
 */
class DocumentUserShippingAddress extends DocumentUserAddress {
    use ElementTrait;
}
