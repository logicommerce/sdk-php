<?php

namespace SDK\Core\Resources\Loggers;

use SDK\Core\Resources\Logger\LoggerAdapter;

/**
 * This is the Exception Logger class.
 *
 * @package SDK\Core\Resources\Loggers
 */
final class ExceptionLogger extends LoggerAdapter {

    protected const REQUIRED_PARAMS = [ 'class', 'code',  ];

    protected const PARAMS = [ 'file', 'line' ];
    
    protected function getLoggerName(): string {
        return 'exception_log';
    }

    protected function getLogName(): string {
        return 'exception';
    }
}
