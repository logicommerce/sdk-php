<?php

declare(strict_types=1);

namespace SDK\Core\Resources;

use SDK\Core\Exceptions\VarnishManagementException;

/**
 * This is the varnish management management class.
 * The headers needed to manage Varnish cache will be setted and sent on that class.
 *
 * @see VarnishManagement::addXKey()
 * @see VarnishManagement::setHeader()
 * @see VarnishManagement::send()
 *
 * @package SDK\Core\Resources
 */
abstract class VarnishManagement {

    private static array $xKeyHeaders = [];

    private static int $xTtl = 9223371776; // Max value in seconds for a variable RTIME in Varnish

    private static array $additionalHeaders = [];

    private static array $ttlOrigins = [];

    private static bool $addedTtl = false;

    public const VERSION = '1.4.8';

    /**
     * Adds a xkey header with the given value.
     *
     * @param string $value
     *
     * @return void
     */
    public static function addXkey(string $value): void {
        if (strlen(trim($value))) {
            self::$xKeyHeaders[$value] = true;
        }
    }

    /**
     * Adds a set of xkey headers with the given space-delimited values.
     *
     * @param string $value
     *
     * @return void
     */
    public static function addXkeys(string $values): void {
        $values = explode(' ', $values);
        foreach ($values as $value) {
            self::addXkey($value);
        }
    }

    /**
     * Set ttl header value.
     * Checks if the param value is lower than current value to set it.
     *
     * @param string $value
     * @param string $origin
     *
     * @return void
     */
    public static function setXttl(string $value, string $origin): void {
        if (strlen($value)) {
            $auxValue = intval($value);
            if (defined('ERROR_ON_CACHEABLE_ZERO_TTL') && ERROR_ON_CACHEABLE_ZERO_TTL) {
                self::$ttlOrigins[] = [
                    'ttl' => $auxValue,
                    'origin' => $origin
                ];
            }
            self::$xTtl = $auxValue < self::$xTtl ? $auxValue : self::$xTtl;
            self::$addedTtl = true;
        }
    }

    /**
     * Return if is added ttl to response.
     *
     * @return bool
     */
    public static function isAddedTtl(): bool {
        return self::$addedTtl;
    }

    /**
     * Return ttl response.
     *
     * @return int
     */
    public static function getXttl(): int {
        return self::$xTtl;
    }

    /**
     * Sets a new varnish header with the given key and value.
     *
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public static function setHeader(string $key, string $value): void {
        self::$additionalHeaders[$key] = $value;
    }

    /**
     * Send the setted headers and cookies on this class to manage Varnish cache.
     *
     * @param array $responseHeaders
     * @param bool $cacheable
     *
     * @return void
     */
    public static function send(array $responseHeaders = [], bool $cacheable = true): void {
        if (!headers_sent()) {
            if ($cacheable) {
                if (defined('ERROR_ON_CACHEABLE_ZERO_TTL') && ERROR_ON_CACHEABLE_ZERO_TTL && self::$xTtl === 0) {
                    $zeroRequests = [];
                    foreach (self::$ttlOrigins as $ttls) {
                        if ($ttls['ttl'] === 0) {
                            $zeroRequests[] = $ttls['origin'];
                        }
                    }
                    throw new VarnishManagementException('Following api requests has TTL 0, on a cacheable item: ' . implode("; ", $zeroRequests), VarnishManagementException::CACHEABLE_AND_TTL_0);
                }
                header('xstorable: true', true);
                header('xttl: ' . self::$xTtl . 's', true);
            } else {
                header('xstorable: false', true);
                header('xttl: 0s', true);
            }
            if (!empty(self::$xKeyHeaders)) {
                $xKeyHeader = '';
                $xKeyHeaders = array_keys(self::$xKeyHeaders);
                foreach ($xKeyHeaders as $xKey) {
                    $xKeyHeader .= ' ' . $xKey;
                }
                header('xkey: ' . $xKeyHeader, true);
            }
            foreach (self::$additionalHeaders as $key => $value) {
                header($key . ': ' . $value, true);
            }
            Cookie::set('folcVMV', self::VERSION);
        }
    }
}
