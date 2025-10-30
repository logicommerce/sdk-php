<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the webhook response type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class WebhookResponseType extends Enum {

    public const JSON = 'JSON';

    public const NO_DATA = 'NO_DATA';

    public const XML = 'XML';

}