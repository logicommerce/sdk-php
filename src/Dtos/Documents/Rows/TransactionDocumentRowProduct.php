<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\Rows\TransactionDocumentSingleRow;

/**
 * This is the transaction document row gift class.
 * The transaction document row gift will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see TransactionDocumentSingleRow
 *
 * @package SDK\Dtos\Documents\Rows
 */
class TransactionDocumentRowProduct extends TransactionDocumentSingleRow {
    use ElementTrait;
}
