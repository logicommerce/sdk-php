<?php declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Catalog\News;
use SDK\Services\Parameters\Groups\NewsParametersGroup;

/**
 * This is the news service class.
 * This class will retrieve the news from LogiCommerce API and transform them to objects.
 * All the needed news operations previous to Framework must be done here.
 *
 * @see NewsService::getNews()
 * @see NewsService::getPieceOfNews()
 * @see News
 *
 * @see NewsService::addGetNews()
 * @see NewsService::addGetPieceOfNews()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class NewsService extends Service {
    use ServiceTrait;

    private const REGISTRY_KEY = Registry::NEWS_MODEL;

    /**
     * Returns the news filtered with the given parameters
     *
     * @param NewsParametersGroup $params
     *            object with the needed filters to send to the API news resource
     *
     * @return ElementCollection|NULL
     */
    public function getNews(NewsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(News::class, Resource::NEWS, $params);
    }

    /**
     * Returns the news identified by the given id
     *
     * @param int $id
     *
     * @return News|NULL
     */
    public function getPieceOfNews(int $id = 0): ?News {
        return $this->getElement(News::class, Resource::NEWS_ID, $id);
    }

    /**
     * Add the request to get the news filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param NewsParametersGroup $params
     *            object with the needed filters to send to the API news resource
     *
     * @return void
     */
    public function addGetNews(BatchRequests $batchRequests, string $batchName, NewsParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::NEWS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the news identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetPieceOfNews(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::NEWS_ID)->pathParams(['id' => $id])->build()
        );
    }
}
