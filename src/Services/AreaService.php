<?php declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Catalog\Area;
use SDK\Dtos\Catalog\Category;
use SDK\Dtos\Catalog\CategoryTree;
use SDK\Services\Parameters\Groups\AreaCategoriesTreeParametersGroup;
use SDK\Services\Parameters\Groups\AreaCategoryParametersGroup;
use SDK\Services\Parameters\Groups\AreaParametersGroup;

/**
 * This is the area service class.
 * This class will retrieve the areas from LogiCommerce API and transform them to objects.
 * All the needed banner operations previous to Framework must be done here.
 *
 * @see AreaService::getAreas()
 * @see AreaService::getArea()
 * @see AreaService::getCategoriesArea()
 * @see AreaService::getCategoriesAreaCategories()
 * @see AreaService::getCategoriesAreaCategoriesTree()
 * @see Area
 *
 * @see AreaService::addGetAreas()
 * @see AreaService::addGetArea()
 * @see AreaService::addGetCategoriesArea()
 * @see AreaService::addGetCategoriesAreaCategories()
 * @see AreaService::addGetCategoriesAreaCategoriesTree()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class AreaService extends Service {
    use ServiceTrait;

    private const REGISTRY_KEY = Registry::AREA_MODEL;

    /**
     * Returns the areas filtered with the given parameters
     *
     * @param AreaParametersGroup $params
     *            object with the needed filters to send to the API areas resource
     *
     * @return ElementCollection|NULL
     */
    public function getAreas(AreaParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Area::class, Resource::AREAS, $params);
    }

    /**
     * Returns the area identified by the given id
     *
     * @param int $id
     *
     * @return Area|NULL
     */
    public function getArea(int $id = 0): ?Area {
        return $this->getElement(Area::class, Resource::AREAS_ID, $id);
    }

    /**
     * Returns the area setted with the category role
     *
     * @return Area|NULL
     */
    public function getCategoriesArea(): ?Area {
        return $this->getResourceElement(Area::class, Resource::AREAS_CATEGORY_ROLE);
    }

    /**
     * Returns the categories inside the area setted with the category role
     *
     * @param AreaCategoryParametersGroup $params
     *            object with the needed filters to send to the API
     *
     * @return ElementCollection|NULL
     */
    public function getCategoriesAreaCategories(AreaCategoryParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Category::class, Resource::AREAS_CATEGORY_ROLE_CATEGORIES, $params);
    }

    /**
     * Returns the categories tree inside the area setted with the category role
     *
     * @param AreaCategoriesTreeParametersGroup $params
     *            object with the needed filters to send to the API
     *
     * @return ElementCollection|NULL
     */
    public function getCategoriesAreaCategoriesTree(AreaCategoriesTreeParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(CategoryTree::class, Resource::AREAS_CATEGORY_ROLE_CATEGORIES_TREE, $params);
    }

    /**
     * Add the request to get the areas filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param AreaParametersGroup $params
     *            object with the needed filters to send to the API areas resource
     *
     * @return void
     */
    public function addGetAreas(BatchRequests $batchRequests, string $batchName, AreaParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::AREAS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the area identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetArea(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::AREAS_ID)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the area setted with the category role
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetCategoriesArea(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::AREAS_CATEGORY_ROLE)->build()
        );
    }

    /**
     * Add the request to get the categories inside the area setted with the category role
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param AreaCategoryParametersGroup $params
     *            object with the needed filters to send to the API
     *
     * @return void
     */
    public function addGetCategoriesAreaCategories(
        BatchRequests $batchRequests, string $batchName, AreaCategoryParametersGroup $params = null
    ): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::AREAS_CATEGORY_ROLE_CATEGORIES)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the categories tree inside the area setted with the category role
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param AreaCategoriesTreeParametersGroup $params
     *            object with the needed filters to send to the API
     *
     * @return void
     */
    public function addGetCategoriesAreaCategoriesTree(
        BatchRequests $batchRequests, string $batchName, AreaCategoriesTreeParametersGroup $params = null
    ): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::AREAS_CATEGORY_ROLE_CATEGORIES_TREE)->urlParams($params)->build()
        );
    }
}
