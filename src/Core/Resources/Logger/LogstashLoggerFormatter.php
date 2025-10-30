<?php

declare(strict_types=1);

namespace SDK\Core\Resources\Logger;

use Monolog\LogRecord;

/**
 * This is the Logstash Logger formatter for the PHP SDK for LogiCommerce Logs.
 *
 * @package SDK\Core\Resources\Logger
 */
class LogstashLoggerFormatter extends \Monolog\Formatter\LogstashFormatter {

    private const CONTEXT = 'context';

    public function format(LogRecord $record): string {
        $recordData = $this->normalizeRecord($record);

        $message = array(
            '@timestamp' => $recordData['datetime'],
            '@source' => $this->systemName,
            '@fields' => array(),
        );
        if (isset($recordData['message'])) {
            $message['@message'] = $recordData['message'];
        }
        if (isset($recordData['channel'])) {
            $message['@tags'] = array($recordData['channel']);
            $message['@fields']['channel'] = $recordData['channel'];
        }
        if (isset($recordData['level'])) {
            $message['@fields']['level'] = $recordData['level'];
        }
        if ($this->applicationName) {
            $message['@type'] = $this->applicationName;
        }
        if (isset($recordData['extra']['server'])) {
            $message['@source_host'] = $recordData['extra']['server'];
        }
        if (isset($recordData['extra']['url'])) {
            $message['@source_path'] = $recordData['extra']['url'];
        }
        if (!empty($recordData['extra'])) {
            foreach ($recordData['extra'] as $key => $val) {
                $message['@fields'][$this->extraPrefix . $key] = $val;
            }
        }

        $additionalData = $this->getAdditionalData($recordData);
        unset($recordData[self::CONTEXT]);

        $message = $this->logiCommerceFormat($message, $additionalData);

        return $this->toJson($message);
    }

    protected function logiCommerceFormat(array $message, array $additionalData): array {
        foreach ($additionalData as $key => $val) {
            $message['@logData'][$key] = $val;
        }
        return $message;
    }

    protected function getAdditionalData(array $record): array {
        return $record[self::CONTEXT];
    }
}
