<?php

namespace SDK\Dtos\Documents\Transactions\Returns;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the credit node class.
 * The credit nodes will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ReturnProcessDocument
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Transactions\Returns
 */
class CreditNote extends ReturnProcessDocument {
    use ElementTrait;
}
