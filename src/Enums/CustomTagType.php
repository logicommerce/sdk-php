<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the custom tag type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class CustomTagType extends Enum {

    public const CATEGORY = 'CATEGORY';

    public const PAGE = 'PAGE';

    public const PRODUCT = 'PRODUCT';

    public const ORDER = 'ORDER';

    public const ACCOUNT = 'ACCOUNT';

    public const REGISTERED_USER = 'REGISTERED_USER';
}
