<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the validation result enumerate.
 * It represents the possible outcomes returned by the validation endpoints (taxId, vies, ...).
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class ValidationResult extends Enum {

    public const VALID = 'VALID';

    public const INVALID = 'INVALID';

    public const UNSUPPORTED_SCENARIO = 'UNSUPPORTED_SCENARIO';

    public const SKIPPED = 'SKIPPED';

    public const ERROR = 'ERROR';
}
