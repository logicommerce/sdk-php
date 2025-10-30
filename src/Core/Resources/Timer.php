<?php

declare(strict_types=1);

/**
 * Timer class to calculate processes times.
 */

namespace SDK\Core\Resources;

use SDK\Core\Exceptions\TimerException;
use SDK\Core\Resources\Loggers\TimerLogger;

/**
 * This is the Timer class.
 * This class allows us to check times on processes or code-blocks.
 *
 * @package SDK\Core\Resources
 */
final class Timer {

    private static array $timers = [];

    private string $key;

    private float $start = 0.0;

    private bool $running = false;

    private array $flags = [];

    private array $tags = [];

    private float $end;

    private float $loggedTime = 0.0;

    public const START_SUFFIX = '_Start';

    public const END_SUFFIX = '_End';

    /**
     * Constructor.
     */
    private function __construct(string $key) {
        $this->key = $key;
    }

    /**
     * Returns a Timer instance.
     * If is not setted, this method will set it.
     *
     * @return Timer
     */
    public static function getTimer(string $key): self {
        if (!isset(self::$timers[$key])) {
            self::$timers[$key] = new self($key);
        }
        return self::$timers[$key];
    }

    /**
     * Starts the timer
     *
     * @return void
     * @throws TimerException
     */
    public function start(): void {
        if ($this->running) {
            throw new TimerException('Timer already started: ' . $this->key, TimerException::ALREADY_STARTED);
        } elseif ($this->started()) {
            throw new TimerException('Timer already executed: ' . $this->key, TimerException::ALREADY_EXECUTED);
        }
        $this->start = $this->getMicrotime();
        $this->running = true;
    }

    /**
     * Stops the timer
     *
     * @param bool $saveLog
     *
     * @return void
     * @throws TimerException
     */
    public function stop(bool $saveLog = false): void {
        if (!$this->started()) {
            throw new TimerException('Timer not started: ' . $this->key, TimerException::NOT_STARTED);
        } elseif (!$this->running) {
            throw new TimerException('Timer already stopped: ' . $this->key, TimerException::ALREADY_STOPPED);
        }
        $this->end = $this->getMicrotime();
        $this->loggedTime = $this->end - $this->start;
        $this->running = false;
        if ($saveLog) {
            TimerLogger::getInstance()->info('Stop timer logger ', $this->logData());
        }
    }

    /**
     * Add new flag to the timer
     *
     * @param string $flag
     * @param bool $overwrite
     *
     * @return void
     * @throws TimerException
     */
    public function addFlag(string $flag, bool $overwrite = false): void {
        if (!$this->started()) {
            throw new TimerException('Can\'t add a new flag on a unstarted Timer: ' . $this->key, TimerException::NOT_STARTED);
        } elseif (!$this->running) {
            throw new TimerException('Can\'t add a new flag on a stopped Timer: ' . $this->key, TimerException::CANNOT_ADD_FLAG);
        } elseif (!$overwrite && isset($this->flags[$flag])) {
            throw new TimerException('Flag "' . $flag . '" already defined on Timer "' . $this->key . '"', TimerException::EXISTING_FLAG);
        }
        $this->flags[$flag] = $this->getMicrotime();
    }

    /**
     * Returns the time elapsed from start until now, or until the given flag.
     *
     * @param string $flag
     *
     * @return number
     * @throws TimerException
     */
    public function getElapsedTime(string $flag = '') {
        if ($flag !== '') {
            if (!isset($this->flags[$flag])) {
                throw new TimerException('Flag "' . $flag . '" is not defined on Timer "' . $this->key . '"', TimerException::UNDEFINED_FLAG);
            }
            $starTime = $this->flags[$flag];
        } else {
            $starTime = $this->start;
        }
        return $this->getMicrotime() - $starTime;
    }

    private function started(): bool {
        return $this->start !== 0.0;
    }

    /**
     * Function that concentrates the measurement of time for a method
     *
     * @param callable $method
     * @param bool $saveLog
     *
     * @return float
     */
    public function measureMethod(callable $method, bool $saveLog = false): float {
        $this->start();
        $method();
        $this->stop($saveLog);
        return $this->loggedTime;
    }

    /**
     * Return the logged timer time
     *
     * @return float
     */
    public function getLoggedTime(): float {
        return $this->loggedTime;
    }

    /**
     * Return the defined timers
     *
     * @return Timer[]
     */
    public static function getTimers(): array {
        return self::$timers;
    }

    private function getMicrotime(): float {
        return round(microtime(true) * 1000);
    }

    private static function getRunningTimers(): ?array {
        return array_filter(self::$timers, fn (self $t) => $t->running);
    }

    private static function getFinishedTimers(): ?array {
        return array_filter(self::$timers, fn (self $t) => !$t->running);
    }

    /**
     * Return the defined timers divided on running state and on finished state
     *
     * @return array
     */
    public static function checkTimers(): array {
        return [
            'running' => self::getRunningTimers(),
            'finished' => self::getFinishedTimers()
        ];
    }

    /**
     * Return an array with the logged time between flags.
     *
     * @return array
     */
    public function getTimeBetweenFlags(bool $numerateKey = true): array {
        $response = [];
        $flagCount = 0;
        foreach ($this->flags as $key => $flag) {
            $flagName = '';
            if (substr($key, -6) === self::START_SUFFIX) {
                $flagName = str_replace(self::START_SUFFIX, '', $key);
                if (isset($this->flags[$flagName . self::END_SUFFIX])) {
                    $response[($numerateKey ? (sprintf("%'.02d", $flagCount) . '_') : '') .
                        $flagName] = $this->flags[$flagName . self::END_SUFFIX] - $flag;
                    $flagCount++;
                }
            }
        }
        return $response;
    }

    /**
     * Add new tag to the timer
     *
     * @param string $tag
     * @param string $value 
     * @param bool $overwrite
     *
     * @return void
     * @throws TimerException
     */
    public function addTag(string $tag, string $value): void {
        if (isset($this->tags[$tag])) {
            $this->tags[$tag] .= $this->tags[$tag] . ',' . $value;
        } else {
            $this->tags[$tag] = $value;
        }
    }

    private function logData(): array {
        $flags = $this->getTimeBetweenFlags(false);
        $auxFlags = [];
        foreach ($flags as $key => $value) {
            $auxFlags[preg_replace('/[^a-zA-Z0-9_-]/', '-', $key)] = $value;
        }
        $flags = $auxFlags;
        return [
            'key' => $this->key,
            'start' => $this->start,
            'end' => $this->end,
            'logged_time' => $this->loggedTime,
            'flags' => $flags,
            'tags' => $this->tags,
            'code' => TimerLogger::LOG_TIME
        ];
    }
}
