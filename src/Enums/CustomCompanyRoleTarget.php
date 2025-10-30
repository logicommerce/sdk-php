<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the custom company role target enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class CustomCompanyRoleTarget extends Enum {

    public const COMPANY_DIVISION_MASTER = 'COMPANY_DIVISION_MASTER';

    public const COMPANY_STRUCTURE_NON_MASTER = 'COMPANY_STRUCTURE_NON_MASTER';
}
