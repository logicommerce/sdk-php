<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the plugin event type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class PluginEvents extends Enum {

    public const SELECT_PAYMENT_SYSTEM = "SELECT_PAYMENT_SYSTEM";

    public const LOGIN_EVENT = "LOGIN_EVENT";

}