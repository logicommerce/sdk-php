<?php

namespace SDK\Core\Resources\Loggers;

use SDK\Core\Resources\Logger\LoggerAdapter;

/**
 * This is the Request Logger class.
 *
 * @package SDK\Core\Resources\Loggers
 */
final class RequestHandlerLogger extends LoggerAdapter {

    public const REQUEST_START  = 'F010-R100';

    protected const PARAMS = [ 'error' ];

    protected const REQUIRED_PARAMS = [
        'code',
        'status_code',
        'status_message',
        'url',
        'time_taken',
        'body',
        'cookies',
        'data',
        'headers',
        'params'
    ];

    protected const DEBUG_PARAMS = [ 'result' ];

    protected function getLoggerName(): string {
        return 'request_handler_log';
    }

    protected function getLogName(): string {
        return 'request';
    }
}
