<?php

namespace SDK\Dtos\Documents\Transactions\Purchases;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the invoice class.
 * The invoice will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PurchaseDocument
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Transactions\Purchases
 */
class Invoice extends PurchaseDocument {
    use ElementTrait;
}
