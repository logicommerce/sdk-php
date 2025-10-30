<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the asset page type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class AssetPageType extends Enum {

    public const ALL = 'ALL';

    public const HOME = 'HOME';

    public const AREA = 'AREA';

    public const CATEGORY = 'CATEGORY';

    public const PRODUCT = 'PRODUCT';

    public const CHECKOUT = 'CHECKOUT';

    public const CHECKOUT_USER = 'CHECKOUT_USER';

    public const PAYMENT_SHIPPING = 'PAYMENT_SHIPPING';

    public const CONFIRM_ORDER = 'CONFIRM_ORDER';

    public const DENIED_ORDER = 'DENIED_ORDER';

    public const PAGE_CONTENT = 'PAGE_CONTENT';

    public const NEWS = 'NEWS';

    public const NEW_USER = 'NEW_USER';

    public const BLOG = 'BLOG';

    public const BLOG_HOME = 'BLOG_HOME';

    public const BLOG_TAGS = 'BLOG_TAGS';

    public const BLOG_CATEGORY = 'BLOG_CATEGORY';

    public const BLOG_POST = 'BLOG_POST';

    public const BLOG_BLOGGER = 'BLOG_BLOGGER';

    public const SEARCH = 'SEARCH';
}
