<?php

declare(strict_types=1);

namespace SDK\Core\Resources;

/**
 * This is the Redis cache class in the LogiCommerce SDK package.
 * All nedded information to cache on Redis will be pepared and managed on that class
 *
 * @see RedisCache::getData()
 *
 * @package SDK\Core\Resources
 */
abstract class RedisCache {

    /**
     * This will return the data associated to the given key
     *
     * @param string $key
     *            Key of the cached data you want to get.
     * @return array
     */
    public static function getData(string $key, callable $apiResource, int $ttl): array {
        if (!Redis::isEnabled() || !defined('USE_CACHE_REDIS_OBJECT') || !USE_CACHE_REDIS_OBJECT) { // avoid use cache
            return $apiResource();
        }
        $data = Redis::get($key);
        if (!is_null($data)) {
            $data = json_decode($data, true);
        }
        if (
            is_null($data) || empty($data)
            || (isset($data['error']) && $data['error']['status'] != 403 && $data['error']['code'] != 'AUTH_LICENSE_REQUIRED')
        ) {
            $data = $apiResource();
            if (
                !is_null($data) && !empty($data) &&
                (!isset($data['error']) || (isset($data['error']) && $data['error']->getStatus() == 403 && $data['error']->getCode() == 'AUTH_LICENSE_REQUIRED'))
            ) {
                Redis::set($key, json_encode($data), $ttl);
            }
        }
        return $data;
    }
}
