<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the tax types enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class TaxType extends Enum {

    public const LOGICOMMERCE = 'LOGICOMMERCE';

    public const PLUGIN_ACCOUNT = 'PLUGIN_ACCOUNT';

}
