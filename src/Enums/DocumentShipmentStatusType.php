<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the document shipment status type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class DocumentShipmentStatusType extends Enum {

    public const INCIDENTS = 'INCIDENTS';

    public const PENDING = 'PENDING';

    public const PROCESSING = 'PROCESSING';

    public const SHIPPED = 'SHIPPED';

    public const DELIVERED = 'DELIVERED';
}
