<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the page types enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class PageType extends Enum {

    public const DEFAULT = 'DEFAULT';

    public const HOME = 'HOME';

    public const CONTACT = 'CONTACT';

    public const SITEMAP = 'SITEMAP';

    public const SUBPAGES = 'SUBPAGES';

    public const USER = 'USER';

    public const SHOPPING_CART = 'SHOPPING_CART';

    public const SPONSORSHIP_REGISTERED_USER = 'SPONSORSHIP_REGISTERED_USER';

    public const NEWSLETTER = 'NEWSLETTER';

    public const SPONSORSHIP_UNREGISTERED_USER = 'SPONSORSHIP_UNREGISTERED_USER';

    public const CATEGORY = 'CATEGORY';

    public const NEWS_LIST = 'NEWS_LIST';

    public const OFFERS = 'OFFERS';

    public const FEATURED_PRODUCTS = 'FEATURED_PRODUCTS';

    public const PRIVACY_POLICY = 'PRIVACY_POLICY';

    public const TERMS_OF_USE = 'TERMS_OF_USE';

    public const BLOG_HOME = 'BLOG_HOME';

    public const BLOG_CATEGORY = 'BLOG_CATEGORY';

    // @Deprecate
    public const CAMPAIGNS = 'CAMPAIGNS';

    public const CUSTOM = 'CUSTOM';

    public const DISCOUNTS = 'DISCOUNTS';

    public const MODULE = 'MODULE';
}
