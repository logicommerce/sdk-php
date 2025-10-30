<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the document type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class DocumentType extends Enum {

    public const ORDER = 'ORDER';

    public const DELIVERY_NOTE = 'DELIVERY_NOTE';

    public const INVOICE = 'INVOICE';

    public const RMA = 'RMA';

    public const RETURN = 'RETURN';

    public const CORRECTIVE_INVOICE = 'CORRECTIVE_INVOICE';

}
