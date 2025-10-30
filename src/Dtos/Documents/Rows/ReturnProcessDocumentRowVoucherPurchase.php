<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\Rows\ReturnProcessDocumentRow;

/**
 * This is the transaction document row voucher purchase class.
 * The transaction document row voucher purchase will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ReturnProcessDocumentRow
 *
 * @package SDK\Dtos\Documents\Rows
 */
class ReturnProcessDocumentRowVoucherPurchase extends ReturnProcessDocumentRow {
    use ElementTrait;
}
