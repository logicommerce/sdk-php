<?php

namespace SDK\Dtos\Documents\Transactions\Returns;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the return DTO class.
 * The return DTO will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ReturnProcessDocument
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Transactions\Returns
 */
class ReturnDTO extends ReturnProcessDocument {
    use ElementTrait;
}
