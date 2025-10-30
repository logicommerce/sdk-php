<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the related type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class RelatedType extends Enum {

    public const RELATED = 'RELATED';

    public const EXTERNAL = 'EXTERNAL';

    public const LINKED = 'LINKED';

}
