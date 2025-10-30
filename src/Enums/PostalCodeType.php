<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the postal code types enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class PostalCodeType extends Enum {

    public const STATE_CITY_POSTAL_CODE = 'STATE_CITY_POSTAL_CODE';

    public const STATE_CITY_WITHOUT_POSTAL_CODE = 'STATE_CITY_WITHOUT_POSTAL_CODE';

    public const POSTAL_CODE_MANDATORY = 'POSTAL_CODE_MANDATORY';

    public const POSTAL_CODE_OPTIONAL = 'POSTAL_CODE_OPTIONAL';
}
