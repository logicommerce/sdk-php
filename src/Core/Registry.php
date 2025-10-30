<?php

namespace SDK\Core;

/**
 *
 * @see RegistryTrait
 *
 * @package SDK\Core
 */
abstract class Registry {
    use RegistryTrait;

    /**
     * These constants sets the ones that can be used as keys on this Registry
     */
    public const APPLICATION = 'application';

    public const AREA_MODEL = 'areaService';

    public const AUTH_MODEL = 'authService';

    public const BANNER_MODEL = 'bannerService';

    public const BASKET_MODEL = 'basketService';

    public const BATCH_MODEL = 'batchService';

    public const BLOG_MODEL = 'blogService';

    public const BRAND_MODEL = 'brandService';

    public const CATEGORY_MODEL = 'categoryService';

    public const CONNECTION = 'connection';

    public const CONTACT_MODEL = 'contactService';

    public const DATA_FEED_MODEL = 'DataFeedService';

    public const DISCOUNT_MODEL = 'DiscountService';

    public const FORM_MODEL = 'formService';

    public const GEOLOCATION_MODEL = 'geolocationService';

    public const KIMERA_MODEL = 'kimeraService';

    public const LEGAL_TEXT_MODEL = 'legalTextService';

    public const LMS_MODEL = 'lmsService';

    public const NEWS_MODEL = 'newsService';

    public const ORDER_MODEL = 'orderService';

    public const PAGE_MODEL = 'pageService';

    public const PAGE_TYPE = 'pageType';

    public const PHYSICAL_LOCATIONS_MODEL = 'physicalLocationsService';

    public const PLUGIN_MODEL = 'pluginService';

    public const PRODUCT_MODEL = 'productService';

    public const ROUTE_MODEL = 'routeService';

    public const SESSION_MODEL = 'sessionService';

    public const SETTINGS_MODEL = 'settingsService';

    public const SITEMAP_MODEL = 'sitemapService';

    public const TRACKER_MODEL = 'trackerService';

    public const USER_MODEL = 'userService';

    public const ACCOUNT_MODEL = 'accountService';

    /**
     *
     * @var array
     */
    private static $storedValues = [
        self::APPLICATION => null,
        self::AREA_MODEL => null,
        self::AUTH_MODEL => null,
        self::BANNER_MODEL => null,
        self::BASKET_MODEL => null,
        self::BATCH_MODEL => null,
        self::BLOG_MODEL => null,
        self::BRAND_MODEL => null,
        self::CATEGORY_MODEL => null,
        self::CONNECTION => null,
        self::CONTACT_MODEL => null,
        self::DATA_FEED_MODEL => null,
        self::DISCOUNT_MODEL => null,
        self::FORM_MODEL => null,
        self::GEOLOCATION_MODEL => null,
        self::KIMERA_MODEL => null,
        self::LEGAL_TEXT_MODEL => null,
        self::LMS_MODEL => null,
        self::NEWS_MODEL => null,
        self::ORDER_MODEL => null,
        self::PAGE_MODEL => null,
        self::PAGE_TYPE => null,
        self::PHYSICAL_LOCATIONS_MODEL => null,
        self::PLUGIN_MODEL => null,
        self::PRODUCT_MODEL => null,
        self::ROUTE_MODEL => null,
        self::SESSION_MODEL => null,
        self::SETTINGS_MODEL => null,
        self::SITEMAP_MODEL => null,
        self::TRACKER_MODEL => null,
        self::USER_MODEL => null,
        self::ACCOUNT_MODEL => null
    ];
}
