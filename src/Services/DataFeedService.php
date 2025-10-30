<?php

declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\CacheTrait;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Common\DataFile;

/**
 * This is the data feed service class.
 * This class will retrieve the data feeds from LogiCommerce API and transform them to objects.
 * All the needed banner operations previous to Framework must be done here.
 *
 * @see DataFeedService::getDataFeed()
 * @see DataFile
 *
 * @see DataFeedService::addGetDataFeed()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class DataFeedService extends Service {
    use ServiceTrait, CacheTrait;

    private const REGISTRY_KEY = Registry::DATA_FEED_MODEL;

    /**
     * Returns the data feed identified by the given hash and the language initials
     *
     * @param string $hash
     * @param string $languageCode
     *
     * @return DataFile|NULL
     */
    public function getDataFeed(string $hash, string $languageCode): ?DataFile {
        return $this->getElement(
            DataFile::class,
            $this->replaceWildcards(Resource::DATA_FEED_LANGUAGE_INITIALS_HASH, ['languageCode' => $languageCode, 'hash' => $hash])
        );
    }

    /**
     * Add the request to get the data feed identified by the given hash and the language initials
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $hash
     * @param string $languageCode
     *
     * @return void
     */
    public function addGetDataFeed(BatchRequests $batchRequests, string $batchName, string $hash, string $languageCode): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)
                ->path(Resource::DATA_FEED_LANGUAGE_INITIALS_HASH)
                ->pathParams(['hash' => $hash, 'languageCode' => $languageCode])
                ->build()
        );
    }
}
