<?php

namespace SDK\Dtos\Documents\Rich\RichReturnProcessDocumentRow;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\Rich\RichReturnProcessDocumentRow;

/**
 * This is the rich gift item class.
 * the gift item will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichReturnProcessDocumentRow
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich\RichReturnProcessDocumentRow
 */
class Gift extends RichReturnProcessDocumentRow {
    use ElementTrait;
}
