<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the related items type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class RelatedItemsType extends Enum {

    public const BANNERS = 'BANNERS';

    public const CATEGORIES = 'CATEGORIES';

    public const NEWS = 'NEWS';

    public const PAGES = 'PAGES';

    public const PRODUCTS = 'PRODUCTS';

    public const POSTS = 'POSTS';

    public static function isValid(string $value): bool {
        return parent::isValid(strtoupper($value));
    }
}
