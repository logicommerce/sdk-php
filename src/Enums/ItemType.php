<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the item types enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class ItemType extends Enum {

    public const NONE = 'NONE';

    public const PRODUCT = 'PRODUCT';

    public const CATEGORY = 'CATEGORY';

    public const PAGE = 'PAGE';

    public const SHIPPER = 'SHIPPER';

    public const NEWS = 'NEWS';

    public const BANNER = 'BANNER';

    public const AREA = 'AREA';

    public const STATE = 'STATE';

    public const ZONE = 'ZONE';

    public const USER = 'USER';

    public const USER_GROUP = 'USER_GROUP';

    public const WISHLIST = 'WISHLIST';

    public const ORDER = 'ORDER';

    public const PAYMENT_SYSTEM = 'PAYMENT_SYSTEM';

    public const SUPPLIER = 'SUPPLIER';

    public const WAREHOUSE = 'WAREHOUSE';

    public const CUSTOM_TAG = 'CUSTOM_TAG';

    public const STOCK = 'STOCK';

    public const DISCOUNT = 'DISCOUNT';

    public const STOCK_SUBSCRIPTION = 'STOCK_SUBSCRIPTION';

    public const COUNTRY = 'COUNTRY';

    public const LOCATION = 'LOCATION';

    public const SHIPPING_ZONE = 'SHIPPING_ZONE';

    public const VIDEO = 'VIDEO';

    public const MULTIMEDIA = 'MULTIMEDIA';

    public const MULTIMEDIA_STRUCTURE = 'MULTIMEDIA_STRUCTURE';

    public const STATES = 'STATES';

    public const SUBSTATES = 'SUBSTATES';

    public const SHIPPING_TYPE = 'SHIPPING_TYPE';

    public const COMMENT = 'COMMENT';

    public const POLL = 'POLL';

    public const REPORTS = 'REPORTS';

    public const GODFATHERS = 'GODFATHERS';

    public const PAGE_GROUP = 'PAGE_GROUP';

    public const BRAND = 'BRAND';

    public const BLOG_POST = 'BLOG_POST';

    public const BLOG_CATEGORY = 'BLOG_CATEGORY';

    public const BLOG_BLOGGER = 'BLOG_BLOGGER';

    public const BLOG_BLOGGERS = 'BLOG_BLOGGERS';

    public const BUNDLES = 'BUNDLES';

    public const PRODUCT_OPTION = 'PRODUCT_OPTION';

    public const RECOMMENDED_BASKETS = 'RECOMMENDED_BASKETS';

    public const RELATED_DEFINITION = 'RELATED_DEFINITION';

    public const COMMERCE = 'COMMERCE';
}
