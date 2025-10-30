<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the route types enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class RouteType extends Enum {

    public const ACCOUNT_CREATE = 'ACCOUNT_CREATE';

    public const ACCOUNT_VERIFY = 'ACCOUNT_VERIFY';

    public const ACCOUNT_DELETE_CONFIRM = 'ACCOUNT_DELETE_CONFIRM';

    public const ACCOUNT_WELCOME = 'ACCOUNT_WELCOME';

    public const ACCOUNT = 'ACCOUNT';

    public const ACCOUNT_ID = 'ACCOUNT_ID';

    public const ACCOUNT_DELETE = 'ACCOUNT_DELETE';

    public const ACCOUNT_ADDRESSES = 'ACCOUNT_ADDRESSES';

    public const ACCOUNT_ADDRESS_CREATE = 'ACCOUNT_ADDRESS_CREATE';

    public const ACCOUNT_ADDRESS = 'ACCOUNT_ADDRESS';

    public const ACCOUNT_REGISTERED_USERS  = 'ACCOUNT_REGISTERED_USERS';

    public const ACCOUNT_REGISTERED_USER_CREATE  = 'ACCOUNT_REGISTERED_USER_CREATE';

    public const ACCOUNT_REGISTERED_USER = 'ACCOUNT_REGISTERED_USER';

    public const ACCOUNT_REGISTERED_USER_APPROVE  = 'ACCOUNT_REGISTERED_USER_APPROVE';

    public const ACCOUNT_ORDERS = 'ACCOUNT_ORDERS';

    public const ACCOUNT_ORDER = 'ACCOUNT_ORDER';

    public const ACCOUNT_RMAS = 'ACCOUNT_RMAS';

    public const ACCOUNT_COMPANY_STRUCTURE = 'ACCOUNT_COMPANY_STRUCTURE';

    public const ACCOUNT_COMPANY_ROLES = 'ACCOUNT_COMPANY_ROLES';

    public const ACCOUNT_COMPANY_ROLE = 'ACCOUNT_COMPANY_ROLE';

    public const ACCOUNT_COMPLETE = 'ACCOUNT_COMPLETE';

    public const ACCOUNT_REWARD_POINTS = 'ACCOUNT_REWARD_POINTS';

    public const ACCOUNT_VOUCHER_CODES = 'ACCOUNT_VOUCHER_CODES';

    public const ACCOUNT_REGISTERED_USER_PAYMENT_CARDS = 'ACCOUNT_REGISTERED_USER_PAYMENT_CARDS';

    public const ACCOUNT_REGISTERED_USER_SHOPPING_LISTS = 'ACCOUNT_REGISTERED_USER_SHOPPING_LISTS';

    public const ACCOUNT_REGISTERED_USER_STOCK_ALERTS = 'ACCOUNT_REGISTERED_USER_STOCK_ALERTS';

    public const ACCOUNT_REGISTERED_USER_SUBSCRIPTIONS = 'ACCOUNT_REGISTERED_USER_SUBSCRIPTIONS';

    public const AREA = ItemType::AREA;

    public const BASKET = 'BASKET';

    public const BASKET_RECOVERY = 'BASKET_RECOVERY';

    public const BLOG = 'BLOG';

    public const BLOG_HOME = 'BLOG_HOME';

    public const BLOG_ARCHIVE = 'BLOG_ARCHIVE';

    public const BLOG_BLOGGER = ItemType::BLOG_BLOGGER;

    public const BLOG_BLOGGERS = ItemType::BLOG_BLOGGERS;

    public const BLOG_CATEGORY = ItemType::BLOG_CATEGORY;

    public const BLOG_CATEGORY_UNSUBSCRIBE = 'BLOG_CATEGORY_UNSUBSCRIBE';

    public const BLOG_POST = ItemType::BLOG_POST;

    public const BLOG_POST_UNSUBSCRIBE = 'BLOG_POST_UNSUBSCRIBE';

    public const BLOG_RSS = 'BLOG_RSS';

    public const BLOG_TAG = 'BLOG_TAG';

    public const BLOG_TAG_CLOUD = 'BLOG_TAG_CLOUD';

    public const BLOG_UNSUBSCRIBE = 'BLOG_UNSUBSCRIBE';

    public const BRAND = 'BRAND';

    public const BRANDS = 'BRANDS';

    // @deprecated
    public const CAMPAIGNS = 'CAMPAIGNS';

    public const CATEGORY = ItemType::CATEGORY;

    public const CHANGE_PASSWORD_ANONYMOUS = 'CHANGE_PASSWORD_ANONYMOUS';

    public const CHECKOUT = 'CHECKOUT';

    public const CHECKOUT_ASYNC_ORDER = 'CHECKOUT_ASYNC_ORDER';

    public const CHECKOUT_BASKET = 'CHECKOUT_BASKET';

    public const CHECKOUT_CONFIRM_ORDER = 'CHECKOUT_CONFIRM_ORDER';

    public const CHECKOUT_CREATE_ACCOUNT = 'CHECKOUT_CREATE_ACCOUNT';

    public const CHECKOUT_CUSTOMER = 'CHECKOUT_CUSTOMER';

    public const CHECKOUT_CUSTOMER_NEW_REGISTER = 'CHECKOUT_CUSTOMER_NEW_REGISTER';

    public const CHECKOUT_DENIED_ORDER = 'CHECKOUT_DENIED_ORDER';

    public const CHECKOUT_END_ORDER = 'CHECKOUT_END_ORDER';

    public const CHECKOUT_GUEST = 'CHECKOUT_GUEST';

    public const CHECKOUT_PAYMENT_AND_SHIPPING = 'CHECKOUT_PAYMENT_AND_SHIPPING';

    public const PRODUCT_COMPARISON = 'PRODUCT_COMPARISON';

    public const CONTACT = 'CONTACT';

    public const DISCOUNT = ItemType::DISCOUNT;

    /** @deprecated */
    public const DISCOUNTS = 'DISCOUNTS';

    public const FEATURED_PRODUCTS = 'FEATURED_PRODUCTS';

    public const FEED = 'FEED';

    public const HOME = 'HOME';

    public const LOGIN_REQUIRED = 'LOGIN_REQUIRED';

    public const NEWS = ItemType::NEWS;

    public const NEWS_LIST = 'NEWS_LIST';

    public const NOT_FOUND = 'NOT_FOUND';

    public const OFFERS = 'OFFERS';

    public const ORDER = ItemType::ORDER;

    public const PAGE = ItemType::PAGE;

    public const PHYSICAL_LOCATION = 'PHYSICAL_LOCATION';

    public const PHYSICAL_LOCATION_CITIES = 'PHYSICAL_LOCATION_CITIES';

    public const PHYSICAL_LOCATION_COUNTRIES = 'PHYSICAL_LOCATION_COUNTRIES';

    public const PHYSICAL_LOCATION_MAP = 'PHYSICAL_LOCATION_MAP';

    public const PHYSICAL_LOCATION_STATES = 'PHYSICAL_LOCATION_STATES';

    public const PHYSICAL_LOCATION_STORES = 'PHYSICAL_LOCATION_STORES';

    public const POLL = ItemType::POLL;

    public const PREHOME = 'PREHOME';

    public const PRIVACY_POLICY = 'PRIVACY_POLICY';

    public const PRODUCT = ItemType::PRODUCT;

    public const REGISTERED_USER = 'REGISTERED_USER';

    public const REGISTERED_USER_CHANGE_PASSWORD = 'REGISTERED_USER_CHANGE_PASSWORD';

    public const REGISTERED_USER_SALES_AGENT  = 'REGISTERED_USER_SALES_AGENT';

    public const REGISTERED_USER_SALES_AGENT_SALES  = 'REGISTERED_USER_SALES_AGENT_SALES';

    public const REGISTERED_USER_SALES_AGENT_CUSTOMERS  = 'REGISTERED_USER_SALES_AGENT_CUSTOMERS';

    public const REGISTERED_USER_LOST_PASSWORD  = 'REGISTERED_USER_LOST_PASSWORD';

    public const REGISTERED_USER_OAUTH = 'REGISTERED_USER_OAUTH';

    public const REGISTERED_USER_OAUTH_CALLBACK = 'REGISTERED_USER_OAUTH_CALLBACK';

    public const SEARCH = 'SEARCH';

    public const SITEMAP = 'SITEMAP';

    public const SUBSCRIPTION_VERIFY = 'SUBSCRIPTION_VERIFY';

    public const SUBSCRIPTION_UNSUBSCRIBE = 'SUBSCRIPTION_UNSUBSCRIBE';

    public const TERMS_OF_USE = 'TERMS_OF_USE';

    public const USED_ACCOUNT_SWITCH = 'USED_ACCOUNT_SWITCH';

    /** deprecated use RouteType::ACCOUNT */
    public const USER = ItemType::USER;

    /** deprecated use RouteType::ACCOUNT_ADDRESSES */
    public const USER_ADDRESS_BOOK = 'USER_ADDRESS_BOOK';

    /** deprecated use RouteType::ACCOUNT_ADDRESS_CREATE */
    public const USER_ADDRESS_BOOK_ADD = 'USER_ADDRESS_BOOK_ADD';

    /** deprecated use RouteType::ACCOUNT_ADDRESS */
    public const USER_ADDRESS_BOOK_EDIT = 'USER_ADDRESS_BOOK_EDIT';

    /** deprecated use RouteType::REGISTERED_USER_CHANGE_PASSWORD */
    public const USER_CHANGE_PASSWORD = 'USER_CHANGE_PASSWORD';

    /** deprecated use RouteType::ACCOUNT_COMPLETE */
    public const USER_COMPLETE_ACCOUNT = 'USER_COMPLETE_ACCOUNT';

    /** deprecated use RouteType::ACCOUNT_CREATE */
    public const USER_CREATE_ACCOUNT = 'USER_CREATE_ACCOUNT';

    /** deprecated use RouteType::ACCOUNT_DELETE */
    public const USER_DELETE_ACCOUNT = 'USER_DELETE_ACCOUNT';

    public const USER_DELETE_NEWSLETTER = 'USER_DELETE_NEWSLETTER';

    /** deprecated use RouteType::REGISTERED_USER_LOST_PASSWORD */
    public const USER_LOST_PASSWORD = 'USER_LOST_PASSWORD';

    /** deprecated use RouteType::REGISTERED_USER_OAUTH */
    public const USER_OAUTH = 'USER_OAUTH';

    /** deprecated use RouteType::REGISTERED_USER_OAUTH_CALLBACK */
    public const USER_OAUTH_CALLBACK = 'USER_OAUTH_CALLBACK';

    public const USER_OAUTH_CALLBACK_PATH = 'USER_OAUTH_CALLBACK_PATH';

    /** deprecated use RouteType::ACCOUNT_ORDER */
    public const USER_ORDER = 'USER_ORDER';

    /** deprecated use RouteType::ACCOUNT_ORDERS */
    public const USER_ORDERS = 'USER_ORDERS';

    /** deprecated use RouteType::ACCOUNT_REGISTERED_USER_PAYMENT_CARDS */
    public const USER_PAYMENT_CARDS = 'USER_PAYMENT_CARDS';

    public const USER_POLICIES = 'USER_POLICIES';

    /** @deprecated */
    public const USER_RECOMMENDED_BASKETS = 'USER_RECOMMENDED_BASKETS';

    /** deprecated use RouteType::ACCOUNT_REWARD_POINTS */
    public const USER_REWARD_POINTS = 'USER_REWARD_POINTS';

    /** deprecated use RouteType::ACCOUNT_RMAS */
    public const USER_RMAS = 'USER_RMAS';

    /** deprecated use RouteType::REGISTERED_USER_SALES_AGENT */
    public const USER_SALES_AGENT = 'USER_SALES_AGENT';

    /** deprecated use RouteType::REGISTERED_USER_SALES_AGENT_CUSTOMERS */
    public const USER_SALES_AGENT_CUSTOMERS = 'USER_SALES_AGENT_CUSTOMERS';

    /** deprecated use RouteType::REGISTERED_USER_SALES_AGENT_SALES */
    public const USER_SALES_AGENT_SALES = 'USER_SALES_AGENT_SALES';

    /** deprecated use RouteType::ACCOUNT_REGISTERED_USER_SHOPPING_LISTS */
    public const USER_SHOPPING_LISTS = 'USER_SHOPPING_LISTS';

    /** @deprecated */
    public const USER_SPONSORSHIP = 'USER_SPONSORSHIP';

    /** deprecated use RouteType::ACCOUNT_REGISTERED_USER_STOCK_ALERTS */
    public const USER_STOCK_ALERTS = 'USER_STOCK_ALERTS';

    /** deprecated use RouteType::ACCOUNT_REGISTERED_USER_SUBSCRIPTIONS */
    public const USER_SUBSCRIPTIONS = 'USER_SUBSCRIPTIONS';

    /** deprecated use RouteType::ACCOUNT_WELCOME */
    public const USER_USER_WELCOME = 'USER_USER_WELCOME';

    /** deprecated use RouteType::ACCOUNT_VERIFY */
    public const USER_VERIFY_ACCOUNT = 'USER_VERIFY_ACCOUNT';

    /** deprecated use RouteType::ACCOUNT_VOUCHER_CODES */
    public const USER_VOUCHER_CODES = 'USER_VOUCHER_CODES';

    public const EXPRESS_CHECKOUT_RETURN = 'EXPRESS_CHECKOUT_RETURN';

    public const EXPRESS_CHECKOUT_CANCEL = 'EXPRESS_CHECKOUT_CANCEL';

    public const WEBHOOK = 'WEBHOOK';

    public const WEBHOOK_PATH = 'WEBHOOK_PATH';

    /** @deprecated */
    public const USER_WISHLIST = 'USER_WISHLIST';
}
