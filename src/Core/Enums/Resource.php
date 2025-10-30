<?php

declare(strict_types=1);

namespace SDK\Core\Enums;

use SDK\Core\Dtos\CustomTag;
use SDK\Core\Dtos\Factories\AccountAddressFactory;
use SDK\Core\Dtos\Factories\AccountAddressToAddressFactory;
use SDK\Core\Dtos\Factories\AccountFactory;
use SDK\Core\Dtos\Factories\AccountInvoicingAddressToBillingAddressFactory;
use SDK\Core\Dtos\Factories\AccountShippingAddressToShippingAddressFactory;
use SDK\Dtos\Basket\Basket;
use SDK\Dtos\Basket\Voucher;
use SDK\Dtos\Blog\BlogCategory;
use SDK\Dtos\Blog\Blogger;
use SDK\Dtos\Blog\BlogPost;
use SDK\Dtos\Blog\BlogPostComment;
use SDK\Dtos\Blog\BlogTag;
use SDK\Dtos\Catalog\Area;
use SDK\Dtos\Catalog\Banner;
use SDK\Dtos\Catalog\Brand;
use SDK\Dtos\Catalog\BundleDefinition;
use SDK\Dtos\Catalog\BundleGrouping;
use SDK\Dtos\Catalog\Category;
use SDK\Dtos\Catalog\CategoryTree;
use SDK\Dtos\Catalog\DataValidation;
use SDK\Dtos\Catalog\Linked;
use SDK\Dtos\Catalog\News;
use SDK\Dtos\Catalog\PhysicalLocation;
use SDK\Dtos\Catalog\Product\Comment;
use SDK\Dtos\Catalog\Discount;
use SDK\Dtos\Catalog\Product\Product;
use SDK\Dtos\Catalog\Product\ProductAvailability;
use SDK\Dtos\Catalog\Product\ProductComparison;
use SDK\Dtos\Catalog\Product\ProductRewardPoints;
use SDK\Dtos\Catalog\Product\StockAlert\StockAlert;
use SDK\Dtos\Catalog\RelatedItems;
use SDK\Dtos\Common\Asset;
use SDK\Dtos\Common\DataFile;
use SDK\Dtos\Common\DataText;
use SDK\Dtos\Common\Plugin;
use SDK\Dtos\Common\Route;
use SDK\Dtos\Common\Tracker;
use SDK\Dtos\Common\UserPlugin;
use SDK\Dtos\Country;
use SDK\Dtos\CountryLocation;
use SDK\Dtos\Currency;
use SDK\Dtos\Documents\DeliveryNote;
use SDK\Dtos\Documents\Transactions\Returns\CreditNote;
use SDK\Dtos\Documents\Transactions\Returns\ReturnDTO;
use SDK\Dtos\Documents\Transactions\Returns\RMA;
use SDK\Dtos\Documents\Transactions\Purchases\Invoice;
use SDK\Dtos\Documents\Transactions\Purchases\Order;
use SDK\Dtos\Documents\PDFDocument;
use SDK\Core\Dtos\Factories\TransactionDocumentRowFactory;
use SDK\Core\Dtos\Factories\AddressFactory;
use SDK\Core\Dtos\Factories\BaseCompanyStructureTreeNodeFactory;
use SDK\Core\Dtos\Factories\BasketDeliveryFactory;
use SDK\Core\Dtos\Factories\BasketToUserFactory;
use SDK\Core\Dtos\Factories\MasterFactory;
use SDK\Core\Dtos\Factories\MasterValFactory;
use SDK\Core\Dtos\Factories\PageFactory;
use SDK\Core\Dtos\Factories\PaymentSystemFactory;
use SDK\Core\Dtos\Factories\PluginPropertiesFactory;
use SDK\Core\Dtos\Factories\SalesAgentCustomerFactory;
use SDK\Core\Dtos\Factories\UserPluginPaymentTokenFactory;
use SDK\Dtos\Accounts\AccountHeader;
use SDK\Dtos\Accounts\AccountInvoicingAddress;
use SDK\Dtos\Accounts\AccountOrder;
use SDK\Dtos\Accounts\AccountShippingAddress;
use SDK\Dtos\Accounts\AccountTypes\CompanyDivision;
use SDK\Dtos\Accounts\CustomCompanyRole;
use SDK\Dtos\Accounts\CustomCompanyRoleHeaderWithEmployeesQty;
use SDK\Dtos\Accounts\RegisteredUser;
use SDK\Dtos\Accounts\RegisteredUserAccount;
use SDK\Dtos\Accounts\RegisteredUserExists;
use SDK\Dtos\Accounts\RegisteredUserSimpleProfile;
use SDK\Dtos\Accounts\SalesAgentCustomerData;
use SDK\Dtos\Basket\BasketPickingDelivery;
use SDK\Dtos\Basket\BasketShippingDelivery;
use SDK\Dtos\Basket\LockedStocksAggregateData;
use SDK\Dtos\Catalog\Product\ProductsDiscounts;
use SDK\Dtos\Documents\PickupPointProvider;
use SDK\Dtos\Documents\Rich\RichCreditNote;
use SDK\Dtos\Documents\Rich\RichReturn;
use SDK\Dtos\Documents\Rich\RichRMA;
use SDK\Dtos\Documents\Transactions\Returns\RMAReason;
use SDK\Dtos\Kimera\KimeraDataRequest;
use SDK\Dtos\Language;
use SDK\Dtos\PaymentValidationResponse;
use SDK\Dtos\PayResponse;
use SDK\Dtos\PostalCode;
use SDK\Dtos\QueryMotive;
use SDK\Dtos\SessionAggregateData;
use SDK\Dtos\Settings\BasketStockLockingSettings;
use SDK\Dtos\Settings\BlogSettings;
use SDK\Dtos\Settings\CatalogSettings;
use SDK\Dtos\Settings\CountryLink;
use SDK\Dtos\Settings\CountrySettings;
use SDK\Dtos\Settings\EcommerceSettings;
use SDK\Dtos\Settings\GeneralSettings;
use SDK\Dtos\Settings\GeoIPSettings;
use SDK\Dtos\Settings\LegalSettings;
use SDK\Dtos\Settings\OrdersSettings;
use SDK\Dtos\Settings\SeoSettings;
use SDK\Dtos\Settings\SitemapSettings;
use SDK\Dtos\Settings\StockSettings;
use SDK\Dtos\Settings\TaxSettings;
use SDK\Dtos\Settings\UserAccountsSettings;
use SDK\Dtos\Settings\Version;
use SDK\Dtos\Snippets\CategoryRichSnippets;
use SDK\Dtos\Snippets\ProductRichSnippets;
use SDK\Dtos\User\BillingAddress;
use SDK\Dtos\User\RewardPointsBalance;
use SDK\Dtos\User\SalesAgentCustomer;
use SDK\Dtos\User\SalesAgentSales;
use SDK\Dtos\User\SaveForLaterListRow;
use SDK\Dtos\User\ShippingAddress;
use SDK\Dtos\User\ShoppingList;
use SDK\Dtos\User\ShoppingListRow;
use SDK\Dtos\User\Subscription;
use SDK\Dtos\User\User;
use SDK\Dtos\User\UserExists;
use SDK\Dtos\User\UserOauthUrl;
use SDK\Dtos\User\UserOrder;
use SDK\Dtos\User\UserRMA;
use SDK\Dtos\User\UserStockAlert;

/**
 * This is the API available resources.
 *
 * @see Enum
 *
 * @package SDK\Core\Enums
 */
abstract class Resource extends Enum {

    private const HASH_WILDCARD = '/{hash}';

    private const ID_WILDCARD = '/{id}';

    private const CUSTOMER_ID_WILDCARD = '/{customerId}';

    private const ID_USED_WILDCARD = '/{idUsed}';

    private const BUNDLE_DEFINITION_ID = '/{bundleDefinitionId}';

    private const REGISTERED_USER_ID_WILDCARD = '/{registeredUserId}';

    private const LEGAL_TEXTS = '/legalTexts';

    private const OMS_PREFIX = '/oms';

    private const ORDERS_RESOURCE = '/orders';

    private const PDF = '/pdf';

    private const PROPERTIES = '/properties';

    private const RELATED = '/related';

    private const RICH_SNIPPETS = '/richSnippets';

    private const SUBSCRIBE = '/subscribe';

    private const TYPE_WILDCARD = '/{type}';

    private const TOKEN_WILDCARD = '/{token}';

    public const ACCOUNTS = '/accounts';

    public const ACCOUNTS_ADDRESSES_ID = self::ACCOUNTS . '/addresses' . self::ID_WILDCARD;

    public const ACCOUNTS_COMPANY_ROLE = self::ACCOUNTS . '/company/roles' . self::ID_WILDCARD;

    public const ACCOUNTS_COMPANY_ROLES = self::ACCOUNTS . self::ID_USED_WILDCARD . '/company/roles';

    public const ACCOUNTS_COMPANY_STRUCTURE = self::ACCOUNTS . self::ID_USED_WILDCARD . '/companyStructure';

    public const ACCOUNTS_COMPANY_DIVISIONS = self::ACCOUNTS . self::ID_WILDCARD . '/companyDivisions';

    public const ACCOUNTS_ORDERS = self::ACCOUNTS . self::ID_USED_WILDCARD . '/orders';

    public const ACCOUNTS_ORDERS_APPROVAL_DECISION = self::ORDERS_ID . '/approvalDecision';

    public const ACCOUNTS_DELETE = self::ACCOUNTS . self::ID_USED_WILDCARD . '/delete';

    public const ACCOUNTS_INVOICING_ADDRESSES = self::ACCOUNTS . self::ID_USED_WILDCARD . '/invoicingAddresses';

    public const ACCOUNTS_INVOICING_ADDRESSES_UPDATE = self::ACCOUNTS . '/invoicingAddresses' . self::ID_WILDCARD;

    public const ACCOUNTS_REGISTERED_USERS = self::ACCOUNTS . self::ID_USED_WILDCARD . '/registeredUsers';

    public const ACCOUNTS_REGISTERED_USERS_SEARCH = self::ACCOUNTS . self::ID_USED_WILDCARD . '/registeredUsers/search';

    public const ACCOUNTS_REGISTERED_USERS_WITH_REGISTERED_ID = self::ACCOUNTS . self::ID_USED_WILDCARD . '/registeredUsers' . self::REGISTERED_USER_ID_WILDCARD;

    public const ACCOUNTS_REGISTERED_USERS_WITH_REGISTERED_ID_PENDING_APPROVAL = self::ACCOUNTS . self::ID_WILDCARD . '/registeredUsers' . self::REGISTERED_USER_ID_WILDCARD . '/pendingApproval';

    public const ACCOUNTS_REGISTERED_USERS_APPROVE = self::ACCOUNTS . self::ID_WILDCARD . '/registeredUsers' . self::REGISTERED_USER_ID_WILDCARD . '/approve';

    public const ACCOUNTS_SHIPPING_ADDRESSES = self::ACCOUNTS . self::ID_USED_WILDCARD . '/shippingAddresses';

    public const ACCOUNTS_SHIPPING_ADDRESSES_UPDATE = self::ACCOUNTS . '/shippingAddresses' . self::ID_WILDCARD;

    public const ACCOUNTS_WITH_ID = self::ACCOUNTS . self::ID_USED_WILDCARD;

    public const ACCOUNT_REGISTERED_USERS_EXISTS = '/registeredUsers/exists';

    public const ACCOUNT_REGISTERED_USERS_ME = '/registeredUsers/me';

    public const ACCOUNT_REGISTERED_USERS_ME_ACCOUNTS = '/registeredUsers/me/accounts';

    public const ACCOUNT_SALES_AGENT = '/registeredUsers/me/salesAgent';

    public const ACCOUNT_SALES_AGENT_CUSTOMERS = self::ACCOUNT_SALES_AGENT . '/customers';

    public const ACCOUNT_SALES_AGENT_CUSTOMERS_ID_ORDERS = self::ACCOUNT_SALES_AGENT_CUSTOMERS . self::CUSTOMER_ID_WILDCARD . '/orders';

    public const ACCOUNT_SALES_AGENT_LOGIN = self::ACCOUNT_SALES_AGENT . '/login';

    public const ACCOUNT_SALES_AGENT_LOGOUT = self::ACCOUNT_SALES_AGENT . '/logout';

    public const ACCOUNT_SALES_AGENT_SALES = self::ACCOUNT_SALES_AGENT . '/sales';

    public const ADDRESS_VALIDATE = '/address/validate';

    public const AREAS = '/areas';

    public const AREAS_CATEGORY_ROLE = self::AREAS . '/categoryRole';

    public const AREAS_CATEGORY_ROLE_CATEGORIES = self::AREAS_CATEGORY_ROLE . self::CATEGORIES;

    public const AREAS_CATEGORY_ROLE_CATEGORIES_TREE = self::AREAS_CATEGORY_ROLE_CATEGORIES . '/tree';

    public const AREAS_ID = self::AREAS . self::ID_WILDCARD;

    public const ASSETS = '/assets';

    public const AUTH = '/auth';

    public const BANNERS = '/banners';

    public const BANNERS_ID = self::BANNERS . self::ID_WILDCARD;

    public const BANNERS_ID_DONE_CLICK = self::BANNERS_ID . '/doneClick';

    public const BASKET = self::OMS_PREFIX . '/basket';

    public const BASKET_ADDRESSES = self::BASKET . '/addresses';

    public const BASKET_BUNDLE = self::BASKET . '/bundle';

    public const BASKET_BUNDLE_HASH = self::BASKET_BUNDLE . self::HASH_WILDCARD;

    public const BASKET_CLEAR = self::BASKET . '/clear';

    public const BASKET_COMMENT = self::BASKET . '/comment';

    public const BASKET_CUSTOM_TAGS = self::BASKET . '/customTags';

    public const BASKET_CUSTOMER = self::BASKET . '/customer';

    /*
    * @deprecated 2404-001
    */
    public const BASKET_DELIVERIES = self::BASKET . '/deliveries';

    public const BASKET_PHYSICAL_LOCATION_PICKING_DELIVERIES = self::BASKET . '/physicalLocationPickingDeliveries'; // '/physicalLocationPickingDeliveries'

    public const BASKET_SHIPPING_DELIVERIES = self::BASKET . '/shippingDeliveries';

    public const BASKET_GIFT = self::BASKET . '/gift';

    public const BASKET_LINKED = self::BASKET . '/linked';

    public const BASKET_LINKED_HASH = self::BASKET . '/linked' . self::HASH_WILDCARD;

    public const BASKET_LOCKED_STOCK_TIMERS_U_ID = self::BASKET . '/lockedStockTimers/{uId}';

    public const BASKET_PAYMENT_SYSTEMS = self::BASKET . '/paymentSystems';

    public const BASKET_PRODUCT = self::BASKET . '/product';

    public const BASKET_PRODUCT_HASH = self::BASKET_PRODUCT . self::HASH_WILDCARD;

    public const BASKET_PRODUCT_HASH_PIN = self::BASKET_PRODUCT_HASH . '/pin';

    public const BASKET_PRODUCTS = self::BASKET . '/products';

    public const BASKET_PROVIDER_PICKUP_POINT_PICKING_DELIVERIES = self::BASKET . '/providerPickupPointPickingDeliveries';

    public const BASKET_PROVIDER_PICKUP_POINT_PICKING_DELIVERIES_SELECTED_PICKUP_POINT = self::BASKET_PROVIDER_PICKUP_POINT_PICKING_DELIVERIES . '/selectedPickupPoint';

    public const BASKET_ROW = self::BASKET . '/row';

    public const BASKET_ROW_HASH = self::BASKET_ROW . self::HASH_WILDCARD;

    public const BASKET_ROWS_DELETE = self::BASKET . '/rows/delete';

    public const BASKET_SET_ROWS = self::BASKET . '/rows';

    public const BASKET_RECALCULATE = self::BASKET . '/recalculate';

    public const BASKET_RELATED = self::BASKET . self::RELATED;

    public const BASKET_RELATED_TYPE = self::BASKET_RELATED . self::TYPE_WILDCARD;

    public const BASKET_REWARD_POINTS_REDEEM = self::BASKET . '/rewardPoints/redeem';

    public const BASKET_SHIPPINGS = self::BASKET . '/shippings';

    public const BASKET_VOUCHER_CODE = self::BASKET . '/voucher/{code}';

    public const EXPRESS_CHECKOUT = self::BASKET . '/expressCheckout';

    public const EXPRESS_CHECKOUT_LOGOUT = self::EXPRESS_CHECKOUT . '/logout';

    public const EXPRESS_CHECKOUT_VALIDATE = self::EXPRESS_CHECKOUT . '/validate';

    public const BATCH = '/batch';

    public const BLOG = '/blog';

    public const BLOG_BLOGGERS = self::BLOG . '/bloggers';

    public const BLOG_BLOGGERS_ID = self::BLOG_BLOGGERS . self::ID_WILDCARD;

    public const BLOG_CATEGORIES = self::BLOG . '/categories';

    public const BLOG_CATEGORIES_ID = self::BLOG_CATEGORIES . self::ID_WILDCARD;

    public const BLOG_CATEGORIES_ID_SUBSCRIBE = self::BLOG_CATEGORIES_ID . self::SUBSCRIBE;

    public const BLOG_CATEGORIES_ID_SUBSCRIBE_TOKEN = self::BLOG_CATEGORIES_ID_SUBSCRIBE . self::TOKEN_WILDCARD;

    public const BLOG_POSTS = self::BLOG . '/posts';

    public const BLOG_POSTS_ID = self::BLOG_POSTS . self::ID_WILDCARD;

    public const BLOG_POSTS_ID_COMMENTS = self::BLOG_POSTS_ID . '/comments';

    public const BLOG_POSTS_ID_DISLIKE = self::BLOG_POSTS_ID . '/dislike';

    public const BLOG_POSTS_ID_DONE_HIT = self::BLOG_POSTS_ID . '/doneHit';

    public const BLOG_POSTS_ID_LIKE = self::BLOG_POSTS_ID . '/like';

    public const BLOG_POSTS_ID_RATE = self::BLOG_POSTS_ID . '/rate';

    public const BLOG_POSTS_ID_RELATED = self::BLOG_POSTS_ID . '/related';

    public const BLOG_POSTS_ID_RELATED_TYPE = self::BLOG_POSTS_ID_RELATED . self::TYPE_WILDCARD;

    public const BLOG_POSTS_ID_SUBSCRIBE = self::BLOG_POSTS_ID . self::SUBSCRIBE;

    public const BLOG_POSTS_ID_SUBSCRIBE_TOKEN = self::BLOG_POSTS_ID_SUBSCRIBE . self::TOKEN_WILDCARD;

    public const BLOG_RSS = self::BLOG . '/rss';

    public const BLOG_SUBSCRIBE = self::BLOG . self::SUBSCRIBE;

    public const BLOG_SUBSCRIBE_TOKEN = self::BLOG_SUBSCRIBE . self::TOKEN_WILDCARD;

    public const BLOG_TAGS = self::BLOG . '/tags';

    public const BLOG_TAGS_ID = self::BLOG_TAGS . self::ID_WILDCARD;

    public const BRANDS = '/brands';

    public const BRANDS_ID = self::BRANDS . self::ID_WILDCARD;

    public const BUNDLES_GROUPINGS_PRICES_RECALCULATE = 'bundles/groupings/prices/recalculate';

    public const CATEGORIES = '/categories';

    public const CATEGORIES_ID = self::CATEGORIES . self::ID_WILDCARD;

    public const CATEGORIES_ID_RELATED = self::CATEGORIES_ID . self::RELATED;

    public const CATEGORIES_ID_RELATED_TYPE = self::CATEGORIES_ID_RELATED . self::TYPE_WILDCARD;

    public const CATEGORIES_ID_RICH_SNIPPETS = self::CATEGORIES_ID . self::RICH_SNIPPETS;

    public const CATEGORIES_TREE = self::CATEGORIES . '/tree';

    public const CONTACT = '/contact';

    public const CONTACT_MOTIVES = self::CONTACT . '/motives';

    public const CUSTOM_FORM = '/customForm';

    public const CUSTOM_FORM_SEND_DATA = self::CUSTOM_FORM . '/sendData';

    public const CUSTOM_FORM_SEND_MAIL = self::CUSTOM_FORM . '/sendMail';

    public const DATA_FEED_LANGUAGE_INITIALS_HASH = '/dataFeed/{languageCode}' . self::HASH_WILDCARD;

    public const DATA_VALIDATION = '/dataValidation';

    public const DATA_VALIDATION_ID = self::DATA_VALIDATION . self::ID_WILDCARD;

    public const DELIVERY_NOTES_ID = self::OMS_PREFIX . '/deliveryNotes' . self::ID_WILDCARD;

    public const DELIVERY_NOTES_ID_PDF = self::DELIVERY_NOTES_ID . self::PDF;

    public const DELIVERY_NOTES_ID_RICH = self::DELIVERY_NOTES_ID . self::RICH;

    public const DISCOUNTS = '/discounts';

    public const DISCOUNT_SELECTABLE_GIFTS_ID_PRODUCTS = '/discountSelectableGifts' . self::ID_WILDCARD . '/products';

    public const COUNTRIES = '/countries';

    public const LOCATIONS = '/locations';

    public const LOGIN = '/login';

    public const LOGOUT = '/logout';

    public const LICENSES = '/licenses';

    public const LICENSES_ALL = self::LICENSES . '/all';

    public const LOCATIONS_PATH = self::LOCATIONS . '/path';

    public const LOCATIONS_LOCALITIES = self::LOCATIONS . '/localities';

    public const INVOICES_ID = self::OMS_PREFIX . '/invoices' . self::ID_WILDCARD;

    public const INVOICES_ID_PDF = self::INVOICES_ID . self::PDF;

    public const INVOICES_ID_RICH = self::INVOICES_ID . self::RICH;

    public const LEGAL_TEXTS_PRIVACY_POLICY = self::LEGAL_TEXTS . '/privacyPolicy';

    public const LEGAL_TEXTS_TERMS_OF_USE = self::LEGAL_TEXTS . '/termsOfUse';

    public const NEWS = '/news';

    public const NEWS_ID = self::NEWS . self::ID_WILDCARD;

    public const NEWSLETTER_SUBSCRIPTION = '/newsletterSubscription';

    public const NEWSLETTER_SUBSCRIPTION_CHECK_STATUS = self::NEWSLETTER_SUBSCRIPTION . '/checkStatus';

    public const NEWSLETTER_SUBSCRIPTION_SUBSCRIBE = self::NEWSLETTER_SUBSCRIPTION . '/subscribe';

    public const NEWSLETTER_SUBSCRIPTION_UNSUBSCRIBE = self::NEWSLETTER_SUBSCRIPTION . '/unsubscribe';

    public const OAUTH = '/oauth';

    public const OMS_ATTACHMENT = self::OMS_PREFIX . '/attachment';

    public const OMS_LOCKED_STOCKS_AGGREGATE_DATA = self::OMS_PREFIX . '/lockedStocks/aggregateData';

    public const OMS_ORDER_ID_RMA = self::ORDERS_ID . '/rma';

    public const OMS_ORDER_ID_RMA_REQUEST = self::OMS_ORDER_ID_RMA . '/request';

    public const OMS_ORDER_ID_RMA_RETURNPOINTS = self::OMS_ORDER_ID_RMA . '/returnPoints';

    public const OMS_PICKUP_POINT_PROVIDERS = self::OMS_PREFIX . '/pickupPointProviders';

    public const OMS_RMAS_ID = self::OMS_PREFIX . '/rmas' . self::ID_WILDCARD;

    public const OMS_RMAS_ID_PDF = self::OMS_RMAS_ID . self::PDF;

    public const OMS_RMAS_ID_RICH = self::OMS_RMAS_ID . self::RICH;

    public const OMS_RMAS_REASONS = self::OMS_PREFIX . '/rmas' . '/reasons';

    public const OMS_RMAS_RETURN_ID = self::OMS_PREFIX . '/rmas' . '/return' . self::ID_WILDCARD;

    public const OMS_RMAS_RETURN_ID_PDF = self::OMS_RMAS_RETURN_ID . self::PDF;

    public const OMS_RMAS_RETURN_ID_RICH = self::OMS_RMAS_RETURN_ID . self::RICH;

    public const OMS_RMAS_CREDITNOTE_ID = self::OMS_PREFIX . '/rmas' . '/creditNote' . self::ID_WILDCARD;

    public const OMS_RMAS_CREDITNOTE_ID_PDF = self::OMS_RMAS_CREDITNOTE_ID . self::PDF;

    public const OMS_RMAS_CREDITNOTE_ID_RICH = self::OMS_RMAS_CREDITNOTE_ID . self::RICH;

    public const ORDERS = self::OMS_PREFIX . self::ORDERS_RESOURCE;

    public const WEBHOOK = '/webhook';

    public const KIMERA = '/kimera';

    public const KIMERA_DATA = self::KIMERA . '/data';

    /*
    * @deprecated
    */
    public const ORDERS_BASKET_RECOVERY = self::BASKET . '/recovery';

    public const ORDERS_ID = self::ORDERS . self::ID_WILDCARD;

    public const ORDERS_ID_PDF = self::ORDERS_ID . self::PDF;

    public const ORDERS_ID_DELIVERY_NOTES = self::ORDERS_ID . '/deliveryNotes';

    public const ORDERS_ID_INVOICES = self::ORDERS_ID . '/invoices';

    public const ORDERS_ID_PAY = self::ORDERS_ID . '/pay';

    public const ORDERS_ID_RECOVERY = self::ORDERS_ID . '/recovery';

    public const ORDERS_ID_RICH = self::ORDERS_ID . self::RICH;

    public const ORDERS_ID_RMA = self::ORDERS_ID . '/rma';

    public const ORDERS_ID_RMAS = self::ORDERS_ID . '/rmas';

    public const ORDERS_ID_TOKEN = self::ORDERS_ID . self::TOKEN_WILDCARD;

    public const ORDERS_ID_TOKEN_PDF = self::ORDERS_ID_TOKEN . self::PDF;

    public const ORDERS_VALIDATE = self::ORDERS . '/validate';

    public const PAGES = '/pages';

    public const PAGES_ID = self::PAGES . self::ID_WILDCARD;

    public const PAGES_ID_RELATED = self::PAGES_ID . self::RELATED;

    public const PAGES_ID_RELATED_TYPE = self::PAGES_ID_RELATED . self::TYPE_WILDCARD;

    public const PHYSICAL_LOCATIONS = '/physicalLocations';

    public const PLUGINS = '/plugins';

    public const PLUGINS_ID = self::PLUGINS . self::ID_WILDCARD;

    public const PLUGINS_ID_EXECUTE = self::PLUGINS_ID . '/execute';

    public const PLUGINS_ID_PROPERTIES = self::PLUGINS_ID . self::PROPERTIES;

    public const PLUGINS_PROPERTIES = self::PLUGINS . self::PROPERTIES;

    public const PRODUCT_COMPARISON = '/productComparison';

    public const PRODUCT_COMPARISON_PRODUCTS = self::PRODUCT_COMPARISON . '/products';

    public const PRODUCT_COMPARISON_PRODUCTS_ID = self::PRODUCT_COMPARISON_PRODUCTS . self::ID_WILDCARD;

    public const PRODUCTS = '/products';

    public const PRODUCTS_BUNDLE_DEFINITIONS_GROUPINGS_COMBINATION_DATA = self::PRODUCTS . '/bundleDefinitions/groupings/combinationData';

    public const PRODUCTS_COMBINATIONS_ID_STOCK_ALERT = self::PRODUCTS . '/combinations' . self::ID_WILDCARD . '/stockAlert';

    public const PRODUCTS_DISCOUNTS = self::PRODUCTS . '/discounts';

    public const PRODUCTS_ID = self::PRODUCTS . self::ID_WILDCARD;

    public const PRODUCTS_ID_BUNDLE_DEFINITIONS = self::PRODUCTS_ID . '/bundleDefinitions';

    public const PRODUCTS_ID_BUNDLE_DEFINITIONS_BUNDLE_ID_GROUPINGS = self::PRODUCTS_ID_BUNDLE_DEFINITIONS . self::BUNDLE_DEFINITION_ID . '/groupings';

    public const PRODUCTS_ID_COMMENTS = self::PRODUCTS_ID . '/comments';

    public const PRODUCTS_ID_COMBINATION_DATA = self::PRODUCTS_ID . '/combinationData';

    public const PRODUCTS_ID_DISCOUNTS = self::PRODUCTS_ID . '/discounts';

    public const PRODUCTS_ID_LINKED = self::PRODUCTS_ID . '/linked';

    public const PRODUCTS_ID_PRODUCT_QUERY = self::PRODUCTS_ID . '/productQuery';

    public const PRODUCTS_ID_RATE = self::PRODUCTS_ID . '/rate';

    public const PRODUCTS_ID_RELATED = self::PRODUCTS_ID . self::RELATED;

    public const PRODUCTS_ID_RELATED_TYPE = self::PRODUCTS_ID_RELATED . self::TYPE_WILDCARD;

    public const PRODUCTS_ID_REWARD_POINTS = self::PRODUCTS_ID . '/rewardPoints';

    public const PRODUCTS_ID_RICH_SNIPPETS = self::PRODUCTS_ID . self::RICH_SNIPPETS;

    public const PRODUCTS_TOP_SELLERS = self::PRODUCTS . '/topSellers';

    public const RECOMMEND = '/recommend';

    public const REFRESH_TOKEN = self::AUTH . '/refreshToken';

    public const RICH = '/rich';

    public const ROUTE = '/route';

    public const SESSION = '/session';

    public const SESSION_AGGREGATE_DATA = '/sessionAggregateData';

    public const SESSION_COUNTRY = self::SESSION . '/country';

    public const SESSION_CURRENCY = self::SESSION . '/currency';

    public const SESSION_LANGUAGE = self::SESSION . '/language';

    public const SETTINGS = '/settings';

    public const SETTINGS_BASKET_STOCK_LOCKING = self::SETTINGS . '/basketStockLocking';

    public const SETTINGS_BLOG = self::SETTINGS . '/blog';

    public const SETTINGS_CATALOG = self::SETTINGS . '/catalog';

    public const SETTINGS_COUNTRIES = self::SETTINGS . '/countries';

    public const SETTINGS_COUNTRIES_LINKS = self::SETTINGS_COUNTRIES . '/links';

    public const SETTINGS_CURRENCIES = self::SETTINGS . '/currencies';

    public const SETTINGS_GENERAL = self::SETTINGS . '/general';

    public const SETTINGS_GEO_IP = self::SETTINGS . '/geoIp';

    public const SETTINGS_LANGUAGES = self::SETTINGS . '/languages';

    public const SETTINGS_LEGAL = self::SETTINGS . '/legal';

    public const SETTINGS_ORDERS = self::SETTINGS . self::ORDERS_RESOURCE;

    public const SETTINGS_SEO = self::SETTINGS . '/seo';

    public const SETTINGS_SITEMAP = self::SETTINGS . '/sitemap';

    public const SETTINGS_STOCK = self::SETTINGS . '/stock';

    public const SETTINGS_TAX = self::SETTINGS . '/tax';

    public const SETTINGS_USER_ACCOUNTS = self::SETTINGS . '/userAccounts';

    public const SITEMAP = '/sitemap';

    public const TRACKERS = '/trackers';

    public const USED_ACCOUNT = '/usedAccount';

    public const USER = '/user';

    public const USER_ADDRESSES = self::USER . '/addresses';

    /**@deprecated*/
    public const USER_ADDRESSES_ID = self::USER_ADDRESSES . self::ID_WILDCARD;

    /**@deprecated*/
    public const USER_BILLING_ADDRESSES = self::USER . '/billingAddresses';

    public const USER_BILLING_ADDRESSES_ID = self::USER_BILLING_ADDRESSES . self::ID_WILDCARD;

    public const USER_CUSTOM_TAGS = self::USER . '/customTags';

    public const USER_EXISTS_VALUE = self::USER . '/exists/{value}';

    /**@deprecated*/
    public const USER_LOGIN = self::USER . '/login';

    /**@deprecated*/
    public const USER_LOGOUT = self::USER . '/logout';

    public const USER_OAUTH = self::USER . self::OAUTH;

    public const USER_ORDERS = self::USER . self::ORDERS_RESOURCE;

    public const USER_ORDERS_ID = self::USER_ORDERS . self::ID_WILDCARD;

    public const USER_PASSWORD_DELETE = self::USER . '/{password}';

    public const USER_PASSWORD = self::USER . '/password';

    public const USER_PASSWORD_HASH = self::USER_PASSWORD . '/hash';

    public const USER_PASSWORD_RECOVER = self::USER_PASSWORD . '/recover';

    public const USER_PASSWORD_HASH_VALIDATE = self::USER_PASSWORD . self::HASH_WILDCARD . '/validate';

    public const USER_PLUGIN_PROPERTIES = self::USER . self::PLUGINS . self::PROPERTIES;

    public const USER_PLUGIN_PROPERTIES_ID = self::USER_PLUGIN_PROPERTIES . self::ID_WILDCARD;

    public const USER_PLUGIN_ID_PAYMENT_TOKENS = self::USER . self::PLUGINS_ID . '/paymentTokens';

    public const USER_PLUGIN_ID_PAYMENT_DELETE_TOKEN = self::USER . self::PLUGINS_ID . '/paymentTokens' . self::TOKEN_WILDCARD;

    public const USER_RELATED = self::USER . self::RELATED;

    public const USER_RELATED_TYPE = self::USER_RELATED . self::TYPE_WILDCARD;

    public const USER_REWARD_POINTS = self::USER . '/rewardPoints';

    public const USER_RMAS = self::USER . '/rmas';

    /**@deprecated*/
    public const USER_SALES_AGENT = self::USER . '/salesAgent';

    /**@deprecated*/
    public const USER_SALES_AGENT_CUSTOMERS = self::USER_SALES_AGENT . '/customers';

    /**@deprecated*/
    public const USER_SALES_AGENT_CUSTOMERS_ID_ORDERS = self::USER_SALES_AGENT_CUSTOMERS . self::CUSTOMER_ID_WILDCARD . '/orders';

    /**@deprecated*/
    public const USER_SALES_AGENT_SALES = self::USER_SALES_AGENT . '/sales';

    /**@deprecated*/
    public const USER_SALES_AGENT_LOGIN = self::USER_SALES_AGENT . '/login';

    /**@deprecated*/
    public const USER_SALES_AGENT_LOGOUT = self::USER_SALES_AGENT . '/logout';

    public const USER_SAVE_FOR_LATER_LIST_ROWS = self::USER . '/saveForLaterList/rows';

    public const USER_SAVE_FOR_LATER_LIST_ROWS_ID = self::USER_SAVE_FOR_LATER_LIST_ROWS . self::ID_WILDCARD;

    public const USER_SAVE_FOR_LATER_LIST_ROWS_ID_TRANSFER_TO_BASKET = self::USER_SAVE_FOR_LATER_LIST_ROWS_ID . '/transferToBasket';

    /**@deprecated*/
    public const USER_SHIPPING_ADDRESSES = self::USER . '/shippingAddresses';

    public const USER_SHIPPING_ADDRESSES_ID = self::USER_SHIPPING_ADDRESSES . self::ID_WILDCARD;

    public const USER_SHOPPING_LISTS = self::USER . '/shoppingLists';

    public const USER_SHOPPING_LISTS_ID = self::USER_SHOPPING_LISTS . self::ID_WILDCARD;

    public const USER_SHOPPING_LISTS_ID_ROWS = self::USER_SHOPPING_LISTS_ID . '/rows';

    public const USER_SHOPPING_LISTS_ID_ROWS_DELETE = self::USER_SHOPPING_LISTS_ID_ROWS . '/delete';

    public const USER_SHOPPING_LISTS_ROWS_ID = self::USER_SHOPPING_LISTS . '/rows' . self::ID_WILDCARD;

    public const USER_STOCK_ALERTS = self::USER . '/stockAlerts';

    public const USER_STOCK_ALERTS_ID = self::USER_STOCK_ALERTS . self::ID_WILDCARD;

    public const USER_SUBSCRIPTIONS = self::USER . '/subscriptions';

    public const USER_SUBSCRIPTIONS_VERIFY_TOKEN = self::USER_SUBSCRIPTIONS . '/verify' . self::TOKEN_WILDCARD;

    public const USER_SUBSCRIPTIONS_UNSUBSCRIBE = self::USER_SUBSCRIPTIONS . '/unsubscribe';

    public const USER_UNSUBSCRIBE_TOKEN = self::USER_SUBSCRIPTIONS . '/unsubscribe' . self::TOKEN_WILDCARD;

    private const USER_VERIFY = self::USER . '/verify';

    public const USER_VERIFY_RESEND = self::USER_VERIFY . '/resend';

    public const USER_VERIFY_UNIQUEID = self::USER_VERIFY . '/{uniqueId}';

    public const USER_VOUCHERS = self::USER . '/vouchers';

    public const USER_WISHLIST = self::USER . '/wishlist';

    public const USER_WISHLIST_PRODUCT_ID = self::USER_WISHLIST . '/product' . self::ID_WILDCARD;

    public const USER_WISHLIST_SEND = self::USER_WISHLIST . '/send';

    public const VERSION = '/version';

    public static function getConstantResource(string $resourcePath): ?string {
        $flippedMap = array_flip(self::getValues());
        if (!isset($flippedMap[$resourcePath])) {
            return null;
        }
        return $flippedMap[$resourcePath];
    }

    public static function getClass(string $resourcePath, bool $isMapping = false): ?string {
        $resource = self::getConstantResource($resourcePath);
        if (!is_null($resource)) {
            $objectType = $resource;
        } else {
            return null;
        }
        $underscorePosition = strpos($resource, '_');
        if ($underscorePosition !== false) {
            $objectType = substr($resource, 0, $underscorePosition);
        }
        return self::getClassFQN($resource, $objectType, $isMapping);
    }

    private static function getClassFQN(string $resource, string $objectType, bool $isMapping = false): string {
        $class = self::getResourceClass($resource);
        if (!is_null($class)) {
            return $class;
        }
        $class = self::getCatalogClass($resource, $objectType, $isMapping);
        if (!is_null($class)) {
            return $class;
        }
        switch ($objectType) {
            case 'ACCOUNT':
                if ($resource === 'ACCOUNT_REGISTERED_USERS_EXISTS') {
                    $class = RegisteredUserExists::class;
                    break;
                } elseif ($resource === 'ACCOUNT_REGISTERED_USERS_ME') {
                    $class = RegisteredUser::class;
                    break;
                } elseif ($resource === 'ACCOUNT_REGISTERED_USERS_ME_ACCOUNTS') {
                    $class = RegisteredUserAccount::class;
                    break;
                } elseif ($resource === 'ACCOUNT_SALES_AGENT_CUSTOMERS') {
                    if (!$isMapping) {
                        $class = SalesAgentCustomerData::class;
                    } else {
                        $class = SalesAgentCustomerFactory::class;
                    }
                    break;
                } elseif ($resource === 'ACCOUNT_SALES_AGENT_CUSTOMERS_ID_ORDERS') {
                    $class = AccountOrder::class;
                    break;
                } elseif ($resource === 'ACCOUNT_SALES_AGENT_SALES') {
                    $class = SalesAgentSales::class;
                    break;
                }
                $class = AccountHeader::class;
                break;
            case 'ACCOUNTS':
                if ($resource === 'ACCOUNTS_ADDRESSES_ID') {
                    if (!$isMapping) {
                        $class = AccountAddressFactory::class;
                    } else {
                        $class = AccountAddressToAddressFactory::class;
                    }
                    break;
                } elseif ($resource === 'ACCOUNTS_COMPANY_DIVISIONS') {
                    $class = CompanyDivision::class;
                    break;
                } elseif ($resource === 'ACCOUNTS_COMPANY_ROLE') {
                    $class = CustomCompanyRole::class;
                    break;
                } elseif ($resource === 'ACCOUNTS_COMPANY_ROLES') {
                    $class = CustomCompanyRoleHeaderWithEmployeesQty::class;
                    break;
                } elseif ($resource === 'ACCOUNTS_COMPANY_STRUCTURE') {
                    $class = BaseCompanyStructureTreeNodeFactory::class;
                    break;
                } elseif ($resource === 'ACCOUNTS_INVOICING_ADDRESSES') {
                    if (!$isMapping) {
                        $class = AccountInvoicingAddress::class;
                    } else {
                        $class = AccountInvoicingAddressToBillingAddressFactory::class;
                    }
                    break;
                } elseif ($resource === 'ACCOUNTS_INVOICING_ADDRESSES_UPDATE') {
                    $class = AccountInvoicingAddress::class;
                    break;
                } elseif ($resource === 'ACCOUNTS_REGISTERED_USERS') {
                    $class = MasterFactory::class;
                    break;
                } elseif ($resource === 'ACCOUNTS_REGISTERED_USERS_SEARCH') {
                    $class = RegisteredUserSimpleProfile::class;
                    break;
                } elseif ($resource === 'ACCOUNTS_REGISTERED_USERS_WITH_REGISTERED_ID') {
                    $class = MasterValFactory::class;
                    break;
                } elseif ($resource === 'ACCOUNTS_REGISTERED_USERS_APPROVE') {
                    $class = MasterValFactory::class;
                    break;
                } elseif ($resource === 'ACCOUNTS_REGISTERED_USERS_WITH_REGISTERED_ID_PENDING_APPROVAL') {
                    $class = MasterValFactory::class;
                    break;
                } elseif ($resource === 'ACCOUNTS_SHIPPING_ADDRESSES') {
                    if (!$isMapping) {
                        $class = AccountShippingAddress::class;
                    } else {
                        $class = AccountShippingAddressToShippingAddressFactory::class;
                    }
                    break;
                } elseif ($resource === 'ACCOUNTS_SHIPPING_ADDRESSES_UPDATE') {
                    $class = AccountShippingAddress::class;
                    break;
                } elseif ($resource === 'ACCOUNTS_WITH_ID') {
                    $class = AccountFactory::class;
                    break;
                }
                $class = AccountHeader::class;
                break;
            case 'BASKET':
                if ($resource == 'BASKET_PAYMENT_SYSTEMS') {
                    $class = PaymentSystemFactory::class;
                    break;
                } elseif ($resource == 'BASKET_DELIVERIES') {
                    $class = BasketDeliveryFactory::class;
                    break;
                } elseif ($resource == 'BASKET_PHYSICAL_LOCATION_PICKING_DELIVERIES') {
                    $class = BasketPickingDelivery::class;
                    break;
                } elseif ($resource == 'BASKET_PROVIDER_PICKUP_POINT_PICKING_DELIVERIES' || $resource == 'BASKET_PROVIDER_PICKUP_POINT_PICKING_DELIVERIES_SELECTED_PICKUP_POINT') {
                    $class = BasketPickingDelivery::class;
                    break;
                } elseif ($resource == 'BASKET_SHIPPING_DELIVERIES') {
                    $class = BasketShippingDelivery::class;
                    break;
                } elseif ($resource == 'BASKET_LINKED') {
                    $class = Linked::class;
                    break;
                }
                $class = Basket::class;
                break;
            case 'CONTACT':
                $class = QueryMotive::class;
                break;
            case 'BLOG':
                $class = self::getBlogClass($resource);
                break;
            case 'ROUTE':
                $class = Route::class;
                break;
            case 'SETTINGS':
                $class = self::getSettingsClass($resource);
                break;
            case 'TRACKERS':
                $class = Tracker::class;
                break;
            case 'KIMERA_DATA':
                $class = KimeraDataRequest::class;
                break;
            case 'USER':
                if ($resource === 'USER_ADDRESSES_ID') {
                    $class = AddressFactory::class;
                    break;
                }
                if ($resource === 'USER_OAUTH') {
                    $class = UserOauthUrl::class;
                    break;
                } elseif ($resource === 'USER_BILLING_ADDRESSES') {
                    $class = BillingAddress::class;
                    break;
                } elseif ($resource === 'USER_SHIPPING_ADDRESSES') {
                    $class = ShippingAddress::class;
                    break;
                } elseif ($resource === 'USER_SHOPPING_LISTS') {
                    $class = ShoppingList::class;
                    break;
                } elseif ($resource === 'USER_SHOPPING_LISTS_ID_ROWS') {
                    $class = ShoppingListRow::class;
                    break;
                } elseif ($resource === 'USER_SAVE_FOR_LATER_LIST_ROWS') {
                    $class = SaveForLaterListRow::class;
                    break;
                } elseif ($resource === 'USER_WISHLIST') {
                    $class = Product::class;
                    break;
                } elseif ($resource === 'USER_VOUCHERS') {
                    $class = Voucher::class;
                    break;
                } elseif ($resource === 'USER_EXISTS_VALUE') {
                    $class = UserExists::class;
                    break;
                } elseif ($resource === 'USER_SALES_AGENT_CUSTOMERS') {
                    $class = SalesAgentCustomer::class;
                    break;
                } elseif ($resource === 'USER_SALES_AGENT_CUSTOMERS_ID_ORDERS') {
                    $class = UserOrder::class;
                    break;
                } elseif ($resource === 'USER_SALES_AGENT_SALES') {
                    $class = SalesAgentSales::class;
                    break;
                } elseif ($resource === 'USER_REWARD_POINTS') {
                    $class = RewardPointsBalance::class;
                    break;
                } elseif ($resource === 'USER_SUBSCRIPTIONS') {
                    $class = Subscription::class;
                    break;
                }
                $class = User::class;
                break;
            case 'VERSION':
                $class = Version::class;
                break;
            default:
                $class = '';
                break;
        }
        return $class;
    }

    public static function isCollectionResource(string $resource): bool {
        return  in_array(
            $resource,
            [
                'ACCOUNTS_COMPANY_ROLES',
                'ACCOUNTS_INVOICING_ADDRESSES',
                'ACCOUNTS_ORDERS',
                'ACCOUNTS_REGISTERED_USERS',
                'ACCOUNTS_REGISTERED_USERS_SEARCH',
                'ACCOUNTS_SHIPPING_ADDRESSES',
                'ACCOUNT_SALES_AGENT_CUSTOMERS',
                'ACCOUNT_SALES_AGENT_CUSTOMERS_ID_ORDERS',
                'ACCOUNT_SALES_AGENT_SALES',
                'AREAS',
                'AREAS_CATEGORY_ROLE_CATEGORIES',
                'AREAS_CATEGORY_ROLE_CATEGORIES_TREE',
                'ASSETS',
                'BANNERS',
                'BASKET_CUSTOM_TAGS',
                'BASKET_DELIVERIES',
                'BASKET_LINKED',
                'BASKET_PAYMENT_SYSTEMS',
                'BASKET_PHYSICAL_LOCATION_PICKING_DELIVERIES',
                'BASKET_PROVIDER_PICKUP_POINT_PICKING_DELIVERIES',
                'BASKET_PROVIDER_PICKUP_POINT_PICKING_DELIVERIES_SELECTED_PICKUP_POINT',
                'BASKET_SHIPPING_DELIVERIES',
                'BLOG_BLOGGERS',
                'BLOG_CATEGORIES',
                'BLOG_POSTS',
                'BLOG_POSTS_ID_COMMENTS',
                'BLOG_POSTS_ID_RELATED',
                'BLOG_POSTS_ID_RELATED_TYPE',
                'BLOG_TAGS',
                'BRANDS',
                'PRODUCTS_ID_BUNDLE_DEFINITIONS',
                'PRODUCTS_ID_BUNDLE_DEFINITIONS_BUNDLE_ID_GROUPINGS',
                'CATEGORIES',
                'CATEGORIES_ID_RELATED',
                'CATEGORIES_ID_RELATED_TYPE',
                'CATEGORIES_TREE',
                'CONTACT_MOTIVES',
                'DATA_VALIDATION',
                'DISCOUNTS',
                'DISCOUNT_SELECTABLE_GIFTS_ID_PRODUCTS',
                'COUNTRIES',
                'LICENSES',
                'LICENSES_ALL',
                'LOCATIONS',
                'LOCATIONS_PATH',
                'LOCATIONS_LOCALITIES',
                'NEWS',
                'OMS_LOCKED_STOCKS_AGGREGATE_DATA',
                'OMS_ORDER_ID_RMA_REQUEST',
                'OMS_ORDER_ID_RMA_RETURNPOINTS',
                'OMS_PICKUP_POINT_PROVIDERS',
                'OMS_RMAS_REASONS',
                'ORDERS_ID_DELIVERY_NOTES',
                'ORDERS_ID_INVOICES',
                'ORDERS_ID_RMAS',
                'PAGES',
                'PAGES_ID_RELATED',
                'PAGES_ID_RELATED_TYPE',
                'PHYSICAL_LOCATIONS',
                'PLUGINS',
                'PRODUCTS',
                'PRODUCTS_DISCOUNTS',
                'PRODUCTS_ID_COMMENTS',
                'PRODUCTS_ID_DISCOUNTS',
                'PRODUCTS_ID_LINKED',
                'PRODUCTS_ID_RELATED',
                'PRODUCTS_ID_RELATED_TYPE',
                'PRODUCTS_ID_REWARD_POINTS',
                'PRODUCTS_TOP_SELLERS',
                'ACCOUNT_REGISTERED_USERS_ME_ACCOUNTS',
                'SETTINGS_COUNTRIES',
                'SETTINGS_COUNTRIES_LINKS',
                'SETTINGS_CURRENCIES',
                'SETTINGS_LANGUAGES',
                'TRACKERS',
                'USER_BILLING_ADDRESSES',
                'USER_SHIPPING_ADDRESSES',
                'USER_SHOPPING_LISTS',
                'USER_SHOPPING_LISTS_ID_ROWS',
                'USER_SAVE_FOR_LATER_LIST_ROWS',
                'USER_CUSTOM_TAGS',
                'USER_ORDERS',
                'USER_PLUGIN_PROPERTIES',
                'USER_PLUGIN_ID_PAYMENT_TOKENS',
                'USER_RELATED_TYPE',
                'USER_RMAS',
                'USER_REWARD_POINTS',
                'USER_SALES_AGENT_CUSTOMERS',
                'USER_SALES_AGENT_CUSTOMERS_ID_ORDERS',
                'USER_SALES_AGENT_SALES',
                'USER_STOCK_ALERTS',
                'USER_SUBSCRIPTIONS',
                'USER_VOUCHERS',
                'USER_WISHLIST'
            ]
        );
    }

    private static function getResourceClass(string $resource): ?string {
        $class = null;
        if ($resource === 'ASSETS') {
            $class = Asset::class;
        } elseif (strpos($resource, '_RELATED') !== false) {
            $class = RelatedItems::class;
        } elseif (strpos($resource, 'CUSTOM_TAGS') !== false) {
            $class = CustomTag::class;
        } elseif ($resource === 'ORDERS_VALIDATE') {
            $class = PaymentValidationResponse::class;
        } elseif ($resource === 'ORDERS_ID_RECOVERY' || $resource === 'ORDERS_BASKET_RECOVERY') {
            $class = Basket::class;
        } elseif ($resource === 'ORDERS_ID_PAY') {
            $class = PayResponse::class;
        } elseif (strpos($resource, 'USER_STOCK_ALERTS') !== false) {
            $class = UserStockAlert::class;
        } elseif ($resource === 'DATA_FEED_LANGUAGE_INITIALS_HASH' || $resource === 'SITEMAP') {
            $class = DataFile::class;
        } elseif (strpos($resource, 'LEGAL_TEXTS') !== false) {
            $class = DataText::class;
        } elseif ($resource === 'USER_PLUGIN_PROPERTIES') {
            $class = UserPlugin::class;
        } elseif ($resource === 'USER_PLUGIN_ID_PAYMENT_TOKENS') {
            $class = UserPluginPaymentTokenFactory::class;
        } elseif ($resource === 'PLUGINS') {
            $class = Plugin::class;
        } elseif ($resource == 'OMS_LOCKED_STOCKS_AGGREGATE_DATA') {
            $class = LockedStocksAggregateData::class;
        } elseif ($resource === 'OMS_RMAS_ID') {
            $class = RMA::class;
        } elseif ($resource === 'OMS_RMAS_RETURN_ID') {
            $class = ReturnDTO::class;
        } elseif ($resource === 'OMS_RMAS_CREDITNOTE_ID') {
            $class = CreditNote::class;
        } elseif ($resource === 'OMS_RMAS_ID_RICH') {
            $class = RichRMA::class;
        } elseif ($resource === 'OMS_RMAS_RETURN_ID_RICH') {
            $class = RichReturn::class;
        } elseif ($resource === 'OMS_RMAS_CREDITNOTE_ID_RICH') {
            $class = RichCreditNote::class;
        } elseif ($resource === 'PLUGINS_ID_PROPERTIES' || $resource === 'PLUGINS_PROPERTIES') {
            $class = PluginPropertiesFactory::class;
        } elseif (strpos($resource, 'DATA_VALIDATION') !== false) {
            $class = DataValidation::class;
        } elseif (strpos($resource, 'ORDERS_ID_RMAS') !== false) {
            $class = RMA::class;
        } elseif (strpos($resource, 'DISCOUNT_SELECTABLE_GIFTS_ID_PRODUCTS') !== false) {
            $class = Product::class;
        } elseif (strpos($resource, 'KIMERA_DATA') !== false) {
            $class = KimeraDataRequest::class;
        }
        if (is_null($class)) {
            $class = self::getDocumentClass($resource);
        }
        return $class;
    }

    private static function getDocumentClass(string $resource): ?string {
        $class = null;
        if (strpos($resource, '_PDF') !== false) {
            $class = PDFDocument::class;
        } elseif (strpos($resource, 'DELIVERY_NOTES') !== false) {
            $class = DeliveryNote::class;
        } elseif (strpos($resource, 'CREDIT_NOTES') !== false) {
            $class = CreditNote::class;
        } elseif (strpos($resource, 'INVOICES') !== false) {
            $class = Invoice::class;
        } elseif (strpos($resource, 'ACCOUNTS_ORDERS') !== false) {
            $class = AccountOrder::class;
        } elseif (strpos($resource, 'USER_ORDERS') !== false) {
            $class = UserOrder::class;
        } elseif (strpos($resource, 'ORDERS') !== false) {
            $class = Order::class;
        } elseif (strpos($resource, 'OMS_ORDER_ID_RMA_REQUEST') !== false) {
            $class = TransactionDocumentRowFactory::class;
        } elseif (strpos($resource, 'OMS_ORDER_ID_RMA_RETURNPOINTS') !== false) {
            $class = PhysicalLocation::class;
        } elseif ($resource === 'OMS_PICKUP_POINT_PROVIDERS') {
            $class = PickupPointProvider::class;
        } elseif ($resource === 'OMS_RMAS_REASONS') {
            $class = RMAReason::class;
        } elseif (strpos($resource, 'USER_RMAS') !== false) {
            $class = UserRMA::class;
        }
        return $class;
    }

    private static function getCatalogClass(string $resource, string $objectType, bool $isMapping = false): ?string {
        if ($resource === 'SESSION') {
            if (!$isMapping) {
                return Basket::class;
            } else {
                return BasketToUserFactory::class;
            }
        }
        if ($resource === 'SESSION_AGGREGATE_DATA') {
            return SessionAggregateData::class;
        }

        switch ($objectType) {
            case 'AREAS':
                if (strpos($resource, 'CATEGORIES_TREE') !== false) {
                    $class = CategoryTree::class;
                    break;
                } elseif (strpos($resource, 'CATEGORIES') !== false) {
                    $class = Category::class;
                    break;
                }
                $class = Area::class;
                break;
            case 'BANNERS':
                $class = Banner::class;
                break;
            case 'BRANDS':
                $class = Brand::class;
                break;
            case 'CATEGORIES':
                if ($resource === 'CATEGORIES_ID_RICH_SNIPPETS') {
                    $class = CategoryRichSnippets::class;
                    break;
                } elseif ($resource ===  'CATEGORIES_TREE') {
                    $class = CategoryTree::class;
                    break;
                }
                $class = Category::class;
                break;
            case 'DISCOUNTS':
                $class = Discount::class;
                break;
            case 'NEWS':
                $class = News::class;
                break;
            case 'PAGES':
                $class = PageFactory::class;
                break;
            case 'PHYSICAL':
                $class = PhysicalLocation::class;
                break;
            case 'PRODUCT':
                if ($resource === 'PRODUCT_COMPARISON') {
                    $class = ProductComparison::class;
                    break;
                }
            case 'PRODUCTS':
                if ($resource === 'PRODUCTS_ID_RICH_SNIPPETS') {
                    $class = ProductRichSnippets::class;
                    break;
                } elseif ($resource === 'PRODUCTS_ID_BUNDLE_DEFINITIONS') {
                    $class = BundleDefinition::class;
                    break;
                } elseif ($resource === 'PRODUCTS_ID_BUNDLE_DEFINITIONS_BUNDLE_ID_GROUPINGS') {
                    $class = BundleGrouping::class;
                    break;
                } elseif ($resource === 'PRODUCTS_ID_LINKED') {
                    $class = Linked::class;
                    break;
                } elseif ($resource === 'PRODUCTS_ID_REWARD_POINTS') {
                    $class = ProductRewardPoints::class;
                    break;
                } elseif (strpos($resource, '_COMMENTS') !== false) {
                    $class = Comment::class;
                    break;
                } elseif (strpos($resource, '_AVAILABILITIES') !== false) {
                    $class = ProductAvailability::class;
                    break;
                } elseif (strpos($resource, '_DISCOUNTS') !== false) {
                    $class = ProductsDiscounts::class;
                    break;
                } elseif (strpos($resource, 'STOCK_ALERT') !== false) {
                    $class = StockAlert::class;
                    break;
                }
                $class = Product::class;
                break;
            case 'COUNTRIES':
                $class = Country::class;
                break;
            case 'LOCATIONS':
                if (strpos($resource, 'LOCATIONS_LOCALITIES') !== false) {
                    $class = PostalCode::class;
                    break;
                }
                $class = CountryLocation::class;
                break;
            default:
                $class = null;
                break;
        }
        return $class;
    }

    private static function getSettingsClass(string $resource): string {
        switch ($resource) {
            case 'SETTINGS_CATALOG':
                $class = CatalogSettings::class;
                break;
            case 'SETTINGS_COUNTRIES':
                $class = CountrySettings::class;
                break;
            case 'SETTINGS_COUNTRIES_LINKS':
                $class = CountryLink::class;
                break;
            case 'SETTINGS_CURRENCIES':
                $class = Currency::class;
                break;
            case 'SETTINGS_GENERAL':
                $class = GeneralSettings::class;
                break;
            case 'SETTINGS_GEO_IP':
                $class = GeoIPSettings::class;
                break;
            case 'SETTINGS_LANGUAGES':
                $class = Language::class;
                break;
            case 'SETTINGS_LEGAL':
                $class = LegalSettings::class;
                break;
            case 'SETTINGS_ORDERS':
                $class = OrdersSettings::class;
                break;
            case 'SETTINGS_SEO':
                $class = SeoSettings::class;
                break;
            case 'SETTINGS_SITEMAP':
                $class = SitemapSettings::class;
                break;
            case 'SETTINGS_STOCK':
                $class = StockSettings::class;
                break;
            case 'SETTINGS_TAX':
                $class = TaxSettings::class;
                break;
            case 'SETTINGS_BASKET_STOCK_LOCKING':
                $class = BasketStockLockingSettings::class;
                break;
            case 'SETTINGS_BLOG':
                $class = BlogSettings::class;
                break;
            case 'SETTINGS_USER_ACCOUNTS':
                $class = UserAccountsSettings::class;
                break;
            default:
                $class = EcommerceSettings::class;
                break;
        }
        return $class;
    }

    private static function getBlogClass(string $resource): string {
        switch ($resource) {
            case 'BLOG_CATEGORIES':
            case 'BLOG_CATEGORIES_ID':
                $class = BlogCategory::class;
                break;
            case 'BLOG_POSTS':
            case 'BLOG_POSTS_ID':
                $class = BlogPost::class;
                break;
            case 'BLOG_BLOGGERS':
            case 'BLOG_BLOGGERS_ID':
                $class = Blogger::class;
                break;
            case 'BLOG_TAGS':
            case 'BLOG_TAGS_ID':
                $class = BlogTag::class;
                break;
            case 'BLOG_RSS':
                $class = DataFile::class;
                break;
            case 'BLOG_POSTS_ID_COMMENTS':
                $class = BlogPostComment::class;
                break;
            default:
                $class = '';
                break;
        }
        return $class;
    }
}
