<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\Rows\ReturnProcessDocumentRow;

/**
 * This is the transaction document row gift class.
 * The transaction document row gift will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ReturnProcessDocumentRow
 *
 * @package SDK\Dtos\Documents\Rows
 */
class ReturnProcessDocumentRowGift extends ReturnProcessDocumentRow {
    use ElementTrait;
}
