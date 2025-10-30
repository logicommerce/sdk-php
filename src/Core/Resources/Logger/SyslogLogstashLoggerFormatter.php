<?php declare(strict_types=1);

namespace SDK\Core\Resources\Logger;

/**
 * This is the Syslog Logstash Logger formatter for the PHP SDK for LogiCommerce Logs.
 *
 * @package SDK\Core\Resources\Logger
 */
class SyslogLogstashLoggerFormatter extends LogstashLoggerFormatter {


    protected function getAdditionalData(array $record): array {
        if(isset($record['context']['body']) ) {
            if(strlen($record['context']['body']) > SYSLOG_CONTEXT_BODY_MAX_LENGTH){
                $record['context']['body'] = substr($record['context']['body'],0,SYSLOG_CONTEXT_BODY_MAX_LENGTH) . '...';
            }
        }
        return parent::getAdditionalData($record,);
    }

}