<?php declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Catalog\Category;
use SDK\Dtos\Catalog\CategoryTree;
use SDK\Dtos\Snippets\CategoryRichSnippets;
use SDK\Services\Parameters\Groups\CategoriesTreeParametersGroup;
use SDK\Services\Parameters\Groups\CategoryParametersGroup;

/**
 * This is the category service class.
 * This class will retrieve the categories from LogiCommerce API and transform them to objects.
 * All the needed category operations previous to Framework must be done here.
 *
 * @see CategoryService::getCategories()
 * @see CategoryService::getCategoriesTree()
 * @see CategoryService::getCategory()
 * @see CategoryService::getCategoryRichSnippets()
 * @see Category
 *
 * @see CategoryService::addGetCategories()
 * @see CategoryService::addCategoriesTree()
 * @see CategoryService::addGetCategory()
 * @see CategoryService::addGetCategoryRichSnippets()
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
 *
 * @package SDK\Services
 */
class CategoryService extends Service {
    use ServiceTrait, RelatedItemsTrait;

    private const RELATED_ITEMS = Resource::CATEGORIES_ID_RELATED;

    private const RELATED_ITEMS_TYPE = Resource::CATEGORIES_ID_RELATED_TYPE;

    private const REGISTRY_KEY = Registry::CATEGORY_MODEL;

    /**
     * Returns the categories filtered with the given parameters
     *
     * @param CategoryParametersGroup $params
     *            object with the needed filters to send to the API categories resource
     *
     * @return ElementCollection|NULL
     */
    public function getCategories(CategoryParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Category::class, Resource::CATEGORIES, $params);
    }

    /**
     * Returns the categories tree filtered with the given parameters
     *
     * @param CategoriesTreeParametersGroup $params
     *            object with the needed filters to send to the API categories tree resource
     *
     * @return ElementCollection|NULL
     */
    public function getCategoriesTree(CategoriesTreeParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(CategoryTree::class, Resource::CATEGORIES_TREE, $params);
    }

    /**
     * Returns the category identified by the given id
     *
     * @param int $id
     *
     * @return Category|NULL
     */
    public function getCategory(int $id = 0): ?Category {
        return $this->getElement(Category::class, Resource::CATEGORIES_ID, $id);
    }

    /**
     * Returns the rich snippets for the category identified by the given id
     *
     * @param int $id
     *
     * @return CategoryRichSnippets|NULL
     */
    public function getCategoryRichSnippets(int $id = 0): ?CategoryRichSnippets {
        return $this->getElement(CategoryRichSnippets::class, Resource::CATEGORIES_ID_RICH_SNIPPETS, $id);
    }

    /**
     * Add the request to get the categories filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param CategoryParametersGroup $params
     *            object with the needed filters to send to the API categories resource
     *
     * @return void
     */
    public function addGetCategories(BatchRequests $batchRequests, string $batchName, CategoryParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::CATEGORIES)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the categories tree filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param CategoriesTreeParametersGroup $params
     *            object with the needed filters to send to the API categories tree resource
     *
     * @return void
     */
    public function addGetCategoriesTree(BatchRequests $batchRequests, string $batchName, CategoriesTreeParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::CATEGORIES_TREE)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the category identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetCategory(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::CATEGORIES_ID)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the rich snippets for the category identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetCategoryRichSnippets(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::CATEGORIES_ID_RICH_SNIPPETS)->pathParams(['id' => $id])
            ->build()
        );
    }
}
