<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the plugin type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class PluginConnectorType extends Enum {

    public const ADDRESS_VALIDATOR = 'ADDRESS_VALIDATOR';

    public const ASSET = 'ASSET';

    public const BASKET = 'BASKET';

    public const CAPTCHA = 'CAPTCHA';

    public const CONFIRM_ORDER = 'CONFIRM_ORDER';

    public const CUSTOM_TAG = 'CUSTOM_TAG';

    public const DATA = 'DATA';

    public const DOCUMENT_PAYMENT_SYSTEM = 'DOCUMENT_PAYMENT_SYSTEM';

    public const DOCUMENT_SHIPMENT = 'DOCUMENT_SHIPMENT';

    public const EXPRESS_CHECKOUT = 'EXPRESS_CHECKOUT';

    public const MAILING_SYSTEM = 'MAILING_SYSTEM';

    public const MAPS = 'MAPS';

    public const MARKETING = 'MARKETING';

    public const MARKETPLACE = 'MARKETPLACE';

    public const NONE = 'NONE';

    public const OAUTH = 'OAUTH';

    public const ORDER = 'ORDER';

    public const ORDER_STATUS = 'ORDER_STATUS';

    public const PAYMENT_SYSTEM = 'PAYMENT_SYSTEM';

    public const PICKUP_POINT_PROVIDER = 'PICKUP_POINT_PROVIDER';

    public const RELATED_DEFINITION = 'RELATED_DEFINITION';

    public const RMA = 'RMA';

    public const ROUTE = 'ROUTE';

    public const SEARCH_ENGINE = 'SEARCH_ENGINE';

    public const SHIPMENT = 'SHIPMENT';

    public const SHIPPER = 'SHIPPER';

    public const SHIPPING_TYPE = 'SHIPPING_TYPE';

    public const TAXES = 'TAXES';

    public const TRACKER = 'TRACKER';

    public const UNKNOWN = 'UNKNOWN';
}
