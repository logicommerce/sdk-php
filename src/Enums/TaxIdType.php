<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the taxId type enumerate.
 * It represents the kind of taxId being validated by the taxId validation endpoint.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class TaxIdType extends Enum {

    public const TIN = 'TIN';

    public const CONSUMPTION_TAX = 'CONSUMPTION_TAX';
}
