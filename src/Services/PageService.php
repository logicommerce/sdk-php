<?php declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Catalog\Page\Page;
use SDK\Services\Parameters\Groups\PageParametersGroup;

/**
 * This is the page service class.
 * This class will retrieve the pages from LogiCommerce API and transform them to objects.
 * All the needed page operations previous to Framework must be done here.
 *
 * @see PageService::getPages()
 * @see PageService::getPage()
 * @see Page
 *
 * @see PageService::addGetPages()
 * @see PageService::addGetPage()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @uses RelatedItemsTrait
 * @see RelatedItemsTrait
 *
 * @package SDK\Services
 */
class PageService extends Service {
    use ServiceTrait, RelatedItemsTrait;

    private const RELATED_ITEMS = Resource::PAGES_ID_RELATED;

    private const RELATED_ITEMS_TYPE = Resource::PAGES_ID_RELATED_TYPE;

    private const REGISTRY_KEY = Registry::PAGE_MODEL;

    /**
     * Returns the pages filtered with the given parameters
     *
     * @param PageParametersGroup $params
     *            object with the needed filters to send to the API pages resource
     *
     * @return ElementCollection|NULL
     */
    public function getPages(PageParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Page::class, Resource::PAGES, $params);
    }

    /**
     * Returns the page identified by the given id
     *
     * @param int $id
     * @param int $levels
     *
     * @return Page|NULL
     */
    public function getPage(int $id = 0, int $levels = 1): ?Page {
        return $this->getResourceElement(
            Page::class,
            $this->replaceWildcards(Resource::PAGES_ID, ['id' => $id]),
            ['levels' => $levels]
        );
    }

    /**
     * Add the request to get the pages filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param PageParametersGroup $params
     *            object with the needed filters to send to the API pages resource
     *
     * @return void
     */
    public function addGetPages(BatchRequests $batchRequests, string $batchName, PageParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::PAGES)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the page identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     * @param int $levels
     *
     * @return void
     */
    public function addGetPage(BatchRequests $batchRequests, string $batchName, int $id, int $levels = 1): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::PAGES_ID)->pathParams(['id' => $id])->urlParams(['levels' => $levels])
            ->build()
        );
    }
}
