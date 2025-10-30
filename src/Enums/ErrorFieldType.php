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
abstract class ErrorFieldType extends Enum {

    public const REQUIRED = 'REQUIRED';

    public const INVALID = 'INVALID';

}
