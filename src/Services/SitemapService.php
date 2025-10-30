<?php declare(strict_types=1);

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
 * This is the sitemap service class.
 * This class will retrieve the sitemap structure from LogiCommerce API and transform it to object.
 * All the needed sitemap operations previous to Framework must be done here.
 *
 * @see SitemapService::getSitemap()
 * @see Sitemap
 *
 * @see SitemapService::addGetSitemap()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class SitemapService extends Service {
    use ServiceTrait, CacheTrait;

    private const REGISTRY_KEY = Registry::SITEMAP_MODEL;

    /**
     * Returns the sitemap identified by the given id and the language initials
     *
     * @return DataFile|NULL
     */
    public function getSitemap(): ?DataFile {
        return $this->getResourceElement(DataFile::class, Resource::SITEMAP);
    }

    /**
     * Add the request to get the sitemap identified by the given id and the language initials
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetSitemap(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::SITEMAP)->build());
    }
}
