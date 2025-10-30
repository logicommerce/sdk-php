<?php

namespace SDK\Core\Resources\Loggers;

use SDK\Core\Resources\Logger\LoggerAdapter;

/**
 * This is the SDK Connection class.
 *
 * @package SDK\Core\Resources\Loggers
 */
final class ConnectionLogger extends LoggerAdapter {

    public const CONNECTION_INFO = 'F010-C000';

    public const CONNECTION_ERROR = 'F020-C000';

    protected const REQUIRED_PARAMS = [ 'code', 'method', 'path', 'time_taken', 'api_url' ];

    protected const PARAMS = [ 'error' ];

    protected function getLoggerName(): string {
        return 'connection_log';
    }

    protected function getLogName(): string {
        return 'connection';
    }
}
