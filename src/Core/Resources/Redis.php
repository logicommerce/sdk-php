<?php

declare(strict_types=1);

namespace SDK\Core\Resources;

use Predis\Client;
use SDK\Core\Exceptions\InvalidParameterException;
use SDK\Core\Exceptions\RedisException;

/**
 * This class will manage the Redis connections.
 *
 * @see Redis::getRedisConnection()
 * @see Redis::get()
 * @see Redis::set()
 *
 * @package SDK\Core\Resources
 */
abstract class Redis {

    public const KEY_SEPARATOR = ':';

    private static ?Client $instance = null;

    private static ?string $keyPrefix = null;

    private static ?bool $enabled = null;


    /**
     * Returns the if Redis is enabled.
     *
     * @return bool
     */
    public static function isEnabled(): bool {
        if (is_null(self::$enabled)) {
            self::$enabled = false;
            if (!is_null(Environment::get('DATA_STORAGE_HOST')) || !is_null(Environment::get('REDIS_HOST'))) {
                $commerceId = Environment::get('COMMERCE_ID');
                if (is_null($commerceId)) {
                    throw new RedisException(
                        'The definition of the "COMMERCE_ID" is required when use Redis',
                        RedisException::COMMERCE_ID_NOT_DEFINED
                    );
                }
                self::$enabled = true;
            }
        }
        return self::$enabled;
    }

    /**
     * Returns the if Redis key prefix to use.
     *
     * @return string
     */
    public static function getKeyPrefix(): string {
        if (is_null(self::$keyPrefix) && self::isEnabled()) {
            if (!is_null(Environment::get('DATA_STORAGE_PREFIX'))) {
                self::$keyPrefix = Environment::get('DATA_STORAGE_PREFIX');
            } else {
                self::$keyPrefix = 'COMMERCE_' . Environment::get('COMMERCE_ID');
            }
            self::$keyPrefix .= self::KEY_SEPARATOR;
        }
        return self::$keyPrefix;
    }

    /**
     * Returns the Redis connection for this petition.
     *
     * @return Client
     */
    public static function getRedisConnection(): Client {
        if (!self::isEnabled()) {
            throw new RedisException(
                'Redis is disabled to use',
                RedisException::UNABLE_TO_USE_REDIS
            );
        }
        if (is_null(self::$instance)) {
            $redisHost = Environment::get('REDIS_HOST') ?: Environment::get('DATA_STORAGE_HOST');
            if (is_null($redisHost)) {
                throw new InvalidParameterException(
                    'Redis connection needs a host in order to work properly',
                    InvalidParameterException::REDIS_HOST
                );
            }
            $parameters = [
                'host' => $redisHost,
                'port' => Environment::get('REDIS_PORT') ?: Environment::get('DATA_STORAGE_PORT') ?: 6379
            ];
            if (is_null(Environment::get('REDIS_HOST'))) {
                if (Environment::get('DATA_STORAGE_USE_TLS') === 'true') {
                    $parameters['scheme'] = 'tls';
                    $parameters['ssl'] = [
                        'verify_peer_name' => false,
                    ];
                }
                if (!is_null(Environment::get('DATA_STORAGE_USER'))) {
                    $parameters['username'] = Environment::get('DATA_STORAGE_USER');
                }
                if (!is_null(Environment::get('DATA_STORAGE_PASSWORD'))) {
                    $parameters['password'] = Environment::get('DATA_STORAGE_PASSWORD');
                }
            }
            self::$instance = new Client($parameters);
        }
        return self::$instance;
    }

    /**
     * Returns the data stored on the given Redis key.
     *
     * @param string $key
     *            Name of the Redis key you want to get.
     *
     * @return string|NULL
     */
    public static function get(string $key): ?string {
        return self::getRedisConnection()->get(self::getKeyPrefix() . $key);
    }

    /**
     * Sets a Redis key with the given value.
     *
     * @param string $key
     * @param mixed $value
     * @param int $ttl
     *
     * @return void
     */
    public static function set(string $key, $value, int $ttl = null): void {
        $redisConnection = self::getRedisConnection();
        $redisConnection->set(self::getKeyPrefix() . $key, $value);
        if (is_null($ttl)) {
            $ttl = DEFAULT_ON_ERROR_TTL;
        }
        $redisConnection->expire(self::getKeyPrefix() . $key, $ttl);
    }

    /**
     * Delete a Redis key with the given value.
     *
     * @param string $key
     *
     * @return void
     */
    public static function delete(string $key): void {
        $redisConnection = self::getRedisConnection();
        $redisConnection->del(self::getKeyPrefix() . $key);
    }

    /**
     * Get if exists a Redis key with the given value.
     *
     * @param string $key
     *
     * @return int
     */
    public static function exists(string $key): int {
        $redisConnection = self::getRedisConnection();
        return $redisConnection->exists(self::getKeyPrefix() . $key);
    }

    /**
     * Set the expiration for a Redis key with the given value.
     *
     * @param string $key
     * @param int $ttl
     *
     * @return int
     */
    public static function setExpire(string $key, int $ttl): int {
        $redisConnection = self::getRedisConnection();
        return $redisConnection->expire(self::getKeyPrefix() . $key, $ttl);
    }

    /**
     * Get the TTL for a Redis key with the given value.
     *
     * @param string $key
     *
     * @return int
     */
    public static function getTtl(string $key): int {
        $redisConnection = self::getRedisConnection();
        return $redisConnection->ttl(self::getKeyPrefix() . $key);
    }


    /**
     * Get the keys in a Redis with the given pattern.
     *
     * @param string $pattern
     *
     * @return array
     */
    public static function getKeys(string $pattern): array {
        $redisConnection = self::getRedisConnection();
        $keys = [];
        $prefixLen = strlen(self::getKeyPrefix());
        $toScanPattenr = self::getKeyPrefix() . $pattern . self::KEY_SEPARATOR . '*';
        $iterator = 0;
        do {
            $result = $redisConnection->scan($iterator, ['MATCH' => $toScanPattenr, 'COUNT' => 1000]);
            $iterator = $result[0];
            foreach ($result[1] as $key) {
                $keys[] = substr($key, $prefixLen);
            }
        } while ($iterator > 0);
        return $keys;
    }
}
