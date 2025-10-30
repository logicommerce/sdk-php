<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the structure filter enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class StructureFilter extends Enum {

    public const PATH_TO_ROOT = 'PATH_TO_ROOT';

    public const SUB_STRUCTURE = 'SUB_STRUCTURE';

    public const SUB_STRUCTURE_WITH_PATH_TO_ROOT = 'SUB_STRUCTURE_WITH_PATH_TO_ROOT';
}
