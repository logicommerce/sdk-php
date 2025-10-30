<?php

namespace SDK\Core\Enums;

/**
 * This is the logger leveles enumerate.
 *
 * @package SDK\Core\Enums
 */
abstract class LoggerLevel extends Enum{

    public const DEBUG = 0;

    public const INFO = 1;

    public const NOTICE = 2;

    public const WARNING = 3;

    public const ERROR = 4;

    public const CRITICAL = 5;

    public const ALERT = 6;

    public const EMERGENCY = 7;
}
