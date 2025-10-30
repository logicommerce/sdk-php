<?php

declare(strict_types=1);

namespace SDK\Core\Resources\Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogHandler;
use Monolog\Logger;
use Monolog\Level;
use Monolog\ResettableInterface;
use Psr\Log\LoggerInterface;
use SDK\Core\Enums\LoggerLevel;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Core\Exceptions\LoggerException;
use SDK\Core\Resources\Connection;
use SDK\Core\Resources\Environment;
use Stringable;

/**
 * This is the Logger class in the LogiCommerce SDK package.
 * All logging operations are done through this class.
 *
 * @package SDK\Core\Resources\Logger
 */
abstract class LoggerAdapter implements LoggerInterface, ResettableInterface {
    use EnumResolverTrait;

    private static $instances = [];

    private Logger $logger;

    private LogstashLoggerFormatter $loggerFormatter;

    private int $logPartition = 0;

    private array $additionalData;

    private bool $logEnabled = true;

    private array $requiredParams;

    private array $ignoreParams;

    private string $logType = 'disk';

    private string $logLevel = 'INFO';

    private int $loggerLevel = 0;

    private function __construct() {
        $this->logEnabled = self::isEnabled(static::class);
        if (Environment::get('DEVEL')) {
            $this->checkLoggerSetup();
        }
        $this->prepareLogParameters();
        $this->fillAdditionalData();
        $loggerName = $this->getLoggerName();
        $this->logger = new Logger($loggerName);
        if (defined('LOG_HANDLER')) {
            $this->logType = LOG_HANDLER;
        } else {
            $this->logType = 'syslog';
        }
        if (Environment::get('DEVEL') && $this->logType === 'syslog' && function_exists('exec')) {
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                $this->logType = '';
            } else {
                exec("pgrep syslog", $output, $return);
                if ($return != 0) {
                    $this->logType = '';
                }
            }
        }
        if ($this->logType === 'syslog') {
            $this->loggerFormatter = new SyslogLogstashLoggerFormatter($loggerName);
        } else {
            $this->loggerFormatter = new LogstashLoggerFormatter($loggerName);
        }
        $this->configure();
    }

    private function fillAdditionalData(): void {
        $this->additionalData = [
            'requestId' => defined('REQUEST_ID') ? REQUEST_ID : date('dmy-Hms') . '_SDK_' . uniqid(),
            'commerceId' => Environment::get('COMMERCE_ID'),
            'ip' => Connection::getIp(),
            'app' => 'PHP',
            'scope' => 'FRONT',
            'datetime' => gmdate('c')
        ];
    }

    private function checkLoggerSetup(): void {
        if (!defined('static::REQUIRED_PARAMS')) {
            throw new LoggerException(
                'REQUIRED_PARAMS const is required instanciating new Logger',
                LoggerException::REQUIRED_CONSTANT
            );
        }
        if (defined('static::PARAMS') && !empty(static::PARAMS)) {
            $result = array_intersect(static::REQUIRED_PARAMS, static::PARAMS);
            if (!empty($result)) {
                throw new LoggerException(
                    'Duplicated params between constants REQUIRED_PARAMS and PARAMS',
                    LoggerException::DUPLICATED_PARAMETER
                );
            }
        }
    }

    /**
     * Returns the Requested logger instance.
     * If is not setted, this method will set it.
     *
     * @return LoggerAdapter
     */
    public static function getInstance(): self {
        $class = static::class;
        if (
            !isset(self::$instances[$class])
            || self::$instances[$class]->getLogEnabled() != self::isEnabled($class)
            || (defined('LOG_HANDLER') && self::$instances[$class]->getLogType() != LOG_HANDLER)
            || (defined('LOG_LEVEL') && self::$instances[$class]->getLogLevel() != LOG_LEVEL)
            || (defined('LOGGER_LEVEL') && self::$instances[$class]->getLoggerLevel() != LOGGER_LEVEL)
        ) {
            self::$instances[$class] = new $class();
        }
        return self::$instances[$class];
    }

    private function getLogEnabled(): bool {
        return $this->logEnabled;
    }

    private function getLogType(): string {
        return $this->logType;
    }

    private function getLogLevel(): string {
        return $this->logLevel;
    }

    private function getLoggerLevel(): int {
        return $this->loggerLevel;
    }

    private static function isEnabled(string $class): bool {
        $logEnabled = true;
        if (!defined('LOG_ENABLED')) {
            $logEnabled = true;
        } elseif (!LOG_ENABLED) {
            $logEnabled = false;
        } else {
            $constName = strtoupper($class) . '_ENABLED';
            $constName = explode('\\', $constName);
            $constName = end($constName);
            if (!defined($constName)) {
                $logEnabled = true;
            } elseif (!constant($constName)) {
                $logEnabled = false;
            }
        }
        return  $logEnabled;
    }

    /**
     * Adds a log record at the DEBUG level.
     *
     * @param  Stringable|string $message The log message
     * @param  array  $context The log context
     */
    public function debug(Stringable|string $message, array $context = []): void {
        $this->log('debug', $message, $context);
    }

    /**
     * Adds a log record at the INFO level.
     *
     * @param  Stringable|string $message The log message
     * @param  array  $context The log context
     * @return void
     */
    public function info(Stringable|string $message, array $context = []): void {
        $this->log('info', $message, $context);
    }

    /**
     * Adds a log record at the NOTICE level.
     *
     * @param  Stringable|string $message The log message
     * @param  array  $context The log context
     * @return void
     */
    public function notice(Stringable|string $message, array $context = []): void {
        $this->log('notice', $message, $context);
    }

    /**
     * Adds a log record at the WARNING level.
     *
     * @param  Stringable|string $message The log message
     * @param  array  $context The log context
     * @return void
     */
    public function warning(Stringable|string $message, array $context = []): void {
        $this->log('warning', $message, $context);
    }

    /**
     * Adds a log record at the ERROR level.
     *
     * @param  Stringable|string $message The log message
     * @param  array  $context The log context
     * @return void
     */
    public function error(Stringable|string $message, array $context = []): void {
        $this->log('error', $message, $context);
    }

    /**
     * Adds a log record at the CRITICAL level.
     *
     * @param  Stringable|string $message The log message
     * @param  array  $context The log context
     * @return void
     */
    public function critical(Stringable|string $message, array $context = []): void {
        $this->log('critical', $message, $context);
    }

    /**
     * Adds a log record at the ALERT level.
     *
     * @param  Stringable|string $message The log message
     * @param  array  $context The log context
     * @return void
     */
    public function alert(Stringable|string $message, array $context = []): void {
        $this->log('alert', $message, $context);
    }

    /**
     * Adds a log record at the EMERGENCY level.
     *
     * @param  Stringable|string $message The log message
     * @param  array  $context The log context
     * @return void
     */
    public function emergency(Stringable|string $message, array $context = []): void {
        $this->log('emergency', $message, $context);
    }

    /**
     * Adds a log record at an arbitrary level.
     *
     * @param  mixed   $level   The log level
     * @param  Stringable|string $message The log message
     * @param  array  $context The log context
     * @return void
     * @throws LoggerException
     */
    public function log($level, Stringable|string $message, array $context = []): void {
        if ($this->logEnabled !== true) {
            return;
        }
        $this->setLogPartition();
        if (is_array($message)) {
            $message = json_encode($message);
        }
        try {
            $microtime = explode(' ', microtime());
            $this->additionalData['microtime'] = $microtime[1] . ' ' . $microtime[0];
            $data = $this->additionalData + ['level' => $level] + $this->getLogData($context);
            if (count($data) <= 1) {
                return;
            }
            $this->logger->log($level, $message, $data);
        } catch (\Exception $e) {
            throw new LoggerException($e->getMessage(), LoggerException::LOGGING_ERROR);
        }
    }

    private function getResolveLogLevel(): int {
        $const = Logger::class . '::' . $this->resolveLogLevel();
        return (defined($const)) ? constant($const) : Logger::WARNING;
    }

    private function resolveLogLevel(): string {
        if (defined('LOG_LEVEL')) {
            $loggerLevel = strtoupper(LOG_LEVEL ?? 'INFO');
            if (in_array($loggerLevel, Level::NAMES)) {
                return $loggerLevel;
            }
        }
        return 'INFO';
    }

    private function configure(): void {
        $this->setLogPartition();
        $this->logLevel = $this->resolveLogLevel();
        if ($this->logType === 'syslog') {
            $handler = new SyslogHandler('front_php_' . Environment::get('COMMERCE_ID') . '_front_' . $this->getLoggerName(), LOG_USER, $this->logLevel);
        } else {
            $handler = new StreamHandler($this->getLogPath(), $this->logLevel);
        }
        $handler->setFormatter($this->loggerFormatter);
        $this->logger->pushHandler($handler);
    }

    private function getLogPath(): string {
        $path = '/tmp/';
        if (defined('LOG_PATH')) {
            $path = LOG_PATH;
        }
        return realpath($path) . '/' . $this->getLogFullName();
    }

    protected function getLogPartition(): string {
        return $this->logPartition !== 0 ? str_pad($this->logPartition, 4, '0', STR_PAD_LEFT) : '';
    }

    /**
     * Returns the max size of the log file in bytes
     */
    protected function getMaxFilesize(): int {
        return 0;
    }

    private function setLogPartition(): void {
        $currentLogPartition = $this->logPartition;
        if (!$this->isPartitionable()) { // do not split the files of this log
            $this->logPartition = 0;
        } elseif ($this->logPartition === 0) { // init partition
            $this->logPartition = 1;
        } elseif (!is_file($this->getLogPath())) { // do nothing. current logPartition is ok
            return;
        } elseif (filesize($this->getLogPath()) >= $this->getMaxFilesize()) {
            $this->logPartition++;
            $this->setLogPartition();
            return;
        }

        if ($currentLogPartition !== $this->logPartition) {
            $this->reset();
            $this->configure();
        }
    }

    private function getLogFullName(): string {
        $logName = $this->getLogName();

        $logFullName = $logName . '/' . date('Ymd');
        if ($this->isPartitionable()) {
            $logFullName .= '_' . $this->getLogPartition();
        }

        return $logFullName . '_' . $logName . '.log';
    }

    /**
     * Ends a log cycle and resets all handlers and processors to their initial state.
     *
     * Resetting a Logger means flushing/cleaning all buffers and resetting the internal state.
     */
    public function reset(): void {
        $this->logger->reset();
    }

    protected function getLogData(array $data): array {
        $result = [];
        foreach ($this->ignoreParams as $param) {
            unset($data[$param]);
        }
        foreach ($this->requiredParams as $param) {
            if (!isset($data[$param])) {
                throw new LoggerException(
                    'Parameter "' . $param . '" is required on "' . static::class . '" class',
                    LoggerException::REQUIRED_PARAMETER
                );
            }
            $result[$param] = $data[$param];
        }
        if (defined('static::PARAMS') && !empty(static::PARAMS)) {
            foreach (static::PARAMS as $param) {
                $result[$param] = $data[$param] ?? null;
            }
        }
        return $result;
    }

    private function resolveLoggerLevel(): int {
        $loggerLevel = defined('LOGGER_LEVEL') ? LOGGER_LEVEL : LoggerLevel::DEBUG;
        if (is_string($loggerLevel) && !LoggerLevel::isValid($loggerLevel)) {
            $loggerLevel = $this->getEnum(LoggerLevel::class, $loggerLevel, LoggerLevel::DEBUG);
        }
        if ($loggerLevel === LoggerLevel::DEBUG && defined('DEBUGINFOLOGGER_ENABLED') && !DEBUGINFOLOGGER_ENABLED) {
            $loggerLevel = LoggerLevel::INFO;
        }
        return $loggerLevel;
    }

    private function prepareLogParameters(): void {
        $this->requiredParams = [...static::REQUIRED_PARAMS, 'code'];
        $this->ignoreParams = [];
        $this->loggerLevel = $this->resolveLoggerLevel();
        foreach (Level::NAMES as $level) {
            $levelLoggerLevel = $this->getEnum(LoggerLevel::class, $level, null) ?? -1;
            $constName = 'static::' . $level . '_PARAMS';
            if (defined($constName)) {
                if ($this->loggerLevel <= $levelLoggerLevel) {
                    $this->requiredParams = [...$this->requiredParams, ...constant($constName)];
                } else {
                    $this->ignoreParams = [...$this->ignoreParams, ...constant($constName)];
                }
            }
        }
    }

    private function isPartitionable(): bool {
        if ($this->logType === 'syslog') { // the syslog manage this itself
            return false;
        }
        return $this->getMaxFilesize() > 0;
    }

    protected abstract function getLoggerName(): string;

    protected abstract function getLogName(): string;
}
