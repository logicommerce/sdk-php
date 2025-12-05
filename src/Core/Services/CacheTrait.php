<?php

declare(strict_types=1);

namespace SDK\Core\Services;

use SDK\Core\Dtos\Request;
use SDK\Core\Enums\Resource;
use SDK\Core\Resources\RedisCache;
use SDK\Core\Resources\Url;
use SDK\Enums\RedisKey;

/**
 * This is the cache trait.
 * This class will replace the main Service method "call" in order to cache the returns on files.
 * 
 * @see CacheTrait::call()
 *
 * @package SDK\Core\Services
 */
trait CacheTrait {

    protected function call(Request $request, string $apiUrl = null): array {
        $urlParams = $request->getUrlParams();
        if (
            $request->getMethod() !== self::GET
            || $request->getPath() === Resource::USER_PLUGIN_PROPERTIES
            || $request->getPath() === Resource::ACCOUNTS_PLUGIN_PROPERTIES
            || ($request->getPath() === Resource::PLUGINS
                && (!array_key_exists('navigationHash', $urlParams)
                    || array_key_exists('navigationHash', $urlParams)
                    && strlen($urlParams['navigationHash']) == 0))
        ) {
            return parent::call($request, $apiUrl);
        }

        return RedisCache::getData(
            $this->getCacheName($request->getPath() . Url::encodeParams($urlParams)),
            function () use ($request, $apiUrl) {
                return parent::call($request, $apiUrl);
            },
            $this->getCacheTtl()
        );
    }

    private function getCacheTtl(): int {
        return defined('LIFE_TIME_CACHE_OBJECTS') ? LIFE_TIME_CACHE_OBJECTS : 5 * 60;
    }

    private function getCacheName(string $resource): string {
        return RedisKey::OBJECT . ":" . implode('_', array_filter(explode('/', $resource), 'strlen'));
    }
}
