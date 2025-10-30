<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the document currency mode enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class DocumentCurrencyMode extends Enum {

    public const INVOICING = 'INVOICING';

    public const PURCHASE = 'PURCHASE';
}
