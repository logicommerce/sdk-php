<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the basic fixed company role target enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class BasicFixedCompanyRoleTarget extends Enum {

    public const COMPANY_MASTER = 'COMPANY_MASTER';

    public const COMPANY_DIVISION_MASTER = 'COMPANY_DIVISION_MASTER';

    public const COMPANY_STRUCTURE_NON_MASTER = 'COMPANY_STRUCTURE_NON_MASTER';
}
