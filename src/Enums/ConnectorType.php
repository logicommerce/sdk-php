<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the plugin property connector type enumerate.
 *
 * @deprecated Use PluginConnectorType. Pending to remove.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class ConnectorType extends Enum {

    public const BASKET = 'BASKET';

    public const CUSTOM_TAG = 'CUSTOM_TAG';

    public const NONE = 'NONE';

    public const PAYMENT_SYSTEM = 'PAYMENT_SYSTEM';

    public const RELATED_DEFINITION = 'RELATED_DEFINITION';

    public const SHIPPER = 'SHIPPER';
}
