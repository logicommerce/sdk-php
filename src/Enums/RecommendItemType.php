<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the Recommend Item reference types enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class RecommendItemType extends Enum {

    public const PRODUCT = 'PRODUCT';

    public const BUNDLE = 'BUNDLE';
}
