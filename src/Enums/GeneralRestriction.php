<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the account type enumerate.
 * 
 * @package SDK\Enums
 */

abstract class GeneralRestriction extends Enum {
    public const ONLY_GENERAL = 'ONLY_GENERAL';
    public const NON_GENERAL = 'NON_GENERAL';
}
