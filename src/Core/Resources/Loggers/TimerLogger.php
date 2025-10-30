<?php

namespace SDK\Core\Resources\Loggers;

use SDK\Core\Resources\Logger\LoggerAdapter;

/**
 * This is the Timer Logger class.
 *
 * @package SDK\Core\Resources\Loggers
 */
final class TimerLogger extends LoggerAdapter {

    public const LOG_TIME = 'F010-T000';

    protected const REQUIRED_PARAMS = [ 'code', 'key', 'start', 'end', 'logged_time', 'flags', 'tags' ];

    protected function getLoggerName(): string {
        return 'timer_log';
    }

    protected function getLogName(): string {
        return 'timer';
    }
}
