<?php

declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\Status;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Catalog\BundleCombinationData;
use SDK\Dtos\Catalog\BundleDefinition;
use SDK\Dtos\Catalog\BundleGrouping;
use SDK\Dtos\Catalog\Linked;
use SDK\Dtos\Catalog\Product\Comment;
use SDK\Dtos\Catalog\Discount;
use SDK\Dtos\Catalog\Product\Product;
use SDK\Dtos\Catalog\Product\ProductComparison;
use SDK\Dtos\Catalog\Product\ProductRewardPoints;
use SDK\Dtos\Catalog\Product\ProductsDiscounts;
use SDK\Dtos\Catalog\ProductCombinationData;
use SDK\Dtos\Snippets\ProductRichSnippets;
use SDK\Services\Parameters\Groups\Product\GetCombinationDataParametersGroup;
use SDK\Services\Parameters\Groups\BundleDefinitionsGroupingsParametersGroup;
use SDK\Services\Parameters\Groups\BundleDefinitionsParametersGroup;
use SDK\Services\Parameters\Groups\LinkedParametersGroup;
use SDK\Services\Parameters\Groups\Product\AddCommentParametersGroup;
use SDK\Services\Parameters\Groups\Product\AddComparisonProductParametersGroup;
use SDK\Services\Parameters\Groups\Product\CommentsParametersGroup;
use SDK\Services\Parameters\Groups\Product\GetBundleDefinitionsGroupingsCombinationDataParametersGroup;
use SDK\Services\Parameters\Groups\Product\ProductDiscountsParametersGroup;
use SDK\Services\Parameters\Groups\Product\ProductParametersGroup;
use SDK\Services\Parameters\Groups\Product\ProductsParametersGroup;
use SDK\Services\Parameters\Groups\Product\ProductsDiscountsParametersGroup;
use SDK\Services\Parameters\Groups\Product\QueryParametersGroup;
use SDK\Services\Parameters\Groups\Product\RateParametersGroup;
use SDK\Services\Parameters\Groups\Product\RecommendParametersGroup;
use SDK\Services\Parameters\Groups\Product\StockSubscriptionParametersGroup;
use SDK\Services\Parameters\Groups\Product\TopSellersParametersGroup;

/**
 * This is the product service class.
 * This class will retrieve the products from LogiCommerce API and transform them to objects.
 * All the needed product operations previous to Framework must be done here.
 *
 * @see ProductService::getProducts()
 * @see ProductService::getProduct()
 * @see ProductService::getProductRewardPoints()
 * @see ProductService::getProductRichSnippets()
 * @see ProductService::getProductsDiscounts()
 * @see ProductService::getProductDiscounts()
 * @see ProductService::getLinkedProducts()
 * @see ProductService::getTopSellers()
 * @see ProductService::getComments()
 * @see ProductService::addComment()
 * @see ProductService::rate()
 * @see ProductService::stockSubscription()
 * @see ProductService::recommend()
 * @see ProductService::query()
 * @see ProductService::getCombinationData()
 * @see ProductService::getBundleDefinitionsGroupingsCombinationData()
 * @see ProductService::getProductComparison()
 * @see ProductService::addProductComparison()
 * @see ProductService::deleteProductComparison()
 * @see Product
 *
 * @see ProductService::addGetProducts()
 * @see ProductService::addGetProduct()
 * @see ProductService::addGetProductRewardPoints()
 * @see ProductService::addGetProductRichSnippets()
 * @see ProductService::addGetProductsDiscounts()
 * @see ProductService::addGetProductDiscounts()
 * @see ProductService::addGetTopSellers()
 * @see ProductService::addGetComments()
 * @see ProductService::addGetLinkedProducts()
 * @see ProductService::addGetProductComparison()
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
class ProductService extends Service {
    use ServiceTrait, RelatedItemsTrait;

    private const RELATED_ITEMS = Resource::PRODUCTS_ID_RELATED;

    private const RELATED_ITEMS_TYPE = Resource::PRODUCTS_ID_RELATED_TYPE;

    private const REGISTRY_KEY = Registry::PRODUCT_MODEL;

    /**
     * Returns the products filtered with the given parameters
     *
     * @param ProductsParametersGroup $params
     *            object with the needed filters to send to the API products resource
     *
     * @return ElementCollection|NULL
     */
    public function getProducts(ProductsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Product::class, Resource::PRODUCTS, $params);
    }

    /**
     * Returns the product identified by the given id
     *
     * @param int $id
     *
     * @return Product|NULL
     */
    public function getProduct(int $id = 0, ProductParametersGroup $params = null): ?Product {
        return $this->getElement(Product::class, Resource::PRODUCTS_ID, $id, $params);
    }

    /**
     * Returns the product reward points by the given id
     *
     * @param int $id
     *
     * @return ElementCollection|NULL
     */
    public function getProductRewardPoints(int $id = 0): ?ElementCollection {
        return $this->getElements(ProductRewardPoints::class, $this->replaceWildcards(Resource::PRODUCTS_ID_REWARD_POINTS, ['id' => $id]));
    }

    /**
     * Returns the rich snippets for the product identified by the given id
     *
     * @param int $id
     *
     * @return ProductRichSnippets|NULL
     */
    public function getProductRichSnippets(int $id = 0): ?ProductRichSnippets {
        return $this->getElement(ProductRichSnippets::class, Resource::PRODUCTS_ID_RICH_SNIPPETS, $id);
    }

    /**
     * Returns the information for each product contained in the product comparison.
     *
     * @return ProductComparison|NULL
     */
    public function getProductComparison(): ?ProductComparison {
        return $this->getElement(ProductComparison::class, Resource::PRODUCT_COMPARISON);
    }

    /**
     * Adds the specified product to the product comparison.
     *
     * @param AddComparisonProductParametersGroup $addComparisonProduct
     *            object with the needed data to add a new comparison product
     *
     * @return Status|NULL
     */
    public function addProductComparison(AddComparisonProductParametersGroup $addComparisonProduct = null): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::PRODUCT_COMPARISON_PRODUCTS)->method(self::POST)->body($addComparisonProduct)
                    ->build()
            ),
            Status::class
        );
    }

    /**
     * Delete from comparison the given product identified by the given id
     *
     * @param int $id
     *
     * @return Status|NULL
     */
    public function deleteProductComparison(int $id): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path($this->replaceWildcards(Resource::PRODUCT_COMPARISON_PRODUCTS_ID, ['id' => $id]))->method(self::DELETE)
                    ->build()
            ),
            Status::class
        );
    }

    /**
     * Returns the discounts for the products filtered with the given parameters
     *
     * @param ProductsDiscountsParametersGroup $params
     *            object with the needed filters to send to the API products discounts resource
     *
     * @return ElementCollection|NULL
     */
    public function getProductsDiscounts(ProductsDiscountsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(ProductsDiscounts::class, Resource::PRODUCTS_DISCOUNTS, $params);
    }

    /**
     * Returns the discounts for the product identified by the given id
     *
     * @param int $id
     * @param ProductDiscountsParametersGroup $params
     *
     * @return ElementCollection|NULL
     */
    public function getProductDiscounts(int $id = 0, ProductDiscountsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Discount::class, $this->replaceWildcards(Resource::PRODUCTS_ID_DISCOUNTS, ['id' => $id]), $params);
    }

    /**
     * Returns the top sellers products filtered with the given parameters
     *
     * @param TopSellersParametersGroup $params
     *            object with the needed filters to send to the API products/topSellers resource
     *
     * @return ElementCollection|NULL
     */
    public function getTopSellers(TopSellersParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Product::class, Resource::PRODUCTS_TOP_SELLERS, $params);
    }

    /**
     * Returns the product comments filtered with the given parameters
     *
     * @param int $id
     * @param CommentsParametersGroup $params
     *            object with the needed filters to send to the API products/comments resource
     *
     * @return ElementCollection|NULL
     */
    public function getComments(int $id = 0, CommentsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(
            Comment::class,
            $this->replaceWildcards(Resource::PRODUCTS_ID_COMMENTS, ['id' => $id]),
            $params
        );
    }

    /**
     * Returns the product bundle definitions filtered with the given parameters
     *
     * @param int $id
     * @param BundleDefinitionsParametersGroup $params
     *            object with the needed filters to send to the API /products/{id}/bundleDefinitions resource
     *
     * @return ElementCollection|NULL
     */
    public function getBundleDefinitions(int $id = 0, BundleDefinitionsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(
            BundleDefinition::class,
            $this->replaceWildcards(Resource::PRODUCTS_ID_BUNDLE_DEFINITIONS, ['id' => $id]),
            $params
        );
    }

    /**
     * Returns the product bundle definitions groupings filtered with the given parameters
     *
     * @param int $id
     * @param int $bundleDefinitionId
     * @param BundleDefinitionsGroupingsParametersGroup $params
     *            object with the needed filters to send to the API /products/{id}/bundleDefinitions/{bundleDefinitionId}/groupings	resource
     *
     * @return ElementCollection|NULL
     */
    public function getBundleDefinitionsGroupings(int $id = 0, int $bundleDefinitionId = 0, BundleDefinitionsGroupingsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(
            BundleGrouping::class,
            $this->replaceWildcards(Resource::PRODUCTS_ID_BUNDLE_DEFINITIONS_BUNDLE_ID_GROUPINGS, ['id' => $id, 'bundleDefinitionId' => $bundleDefinitionId]),
            $params
        );
    }

    /**
     * Returns the product linked to the product specified
     *
     * @param int $id
     * @param LinkedParametersGroup $params
     *            object with the needed filters to send to the API /products/{id}/linked resource
     *
     * @return ElementCollection|NULL
     */
    public function getLinkedProducts(int $id = 0, LinkedParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(
            Linked::class,
            $this->replaceWildcards(Resource::PRODUCTS_ID_LINKED, ['id' => $id]),
            $params
        );
    }

    /**
     * Add a new comment into the product that matches the given id
     *
     * @param int $id
     * @param AddCommentParametersGroup $comment
     *            object with the needed data to add a new comment
     *
     * @return Comment|NULL
     */
    public function addComment(int $id = 0, AddCommentParametersGroup $comment = null): ?Comment {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::PRODUCTS_ID_COMMENTS)->method(self::POST)->pathParams(['id' => $id])->body($comment)
                    ->build()
            ),
            Comment::class
        );
    }

    /**
     * Add a rate into the product that matches the given id
     *
     * @param int $id
     * @param int $rating
     *            (must be into the 0-5 range)
     *
     * @return Status|NULL
     */
    public function rate(int $id = 0, int $rating = 0): ?Status {
        $data = new RateParametersGroup();
        $data->setRating($rating);
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::PRODUCTS_ID_RATE)->method(self::POST)->pathParams(['id' => $id])->body($data)
                    ->build()
            ),
            Status::class
        );
    }

    /**
     * Subscribe the given email into the combination that matches the given id
     *
     * @param int $id
     *            Combination internal identifier
     * @param string $email
     *
     * @return Status|NULL
     */
    public function stockSubscription(int $id = 0, string $email = ''): ?Status {
        $data = null;
        if (strlen($email) !== 0) {
            $data = new StockSubscriptionParametersGroup();
            $data->setEmail($email);
        }
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::PRODUCTS_COMBINATIONS_ID_STOCK_ALERT)->method(self::POST)->pathParams(['id' => $id])->body($data)
                    ->build()
            ),
            Status::class
        );
    }

    /**
     * Send a recommendation of the specified items to the email address supplied.
     *
     * @param RecommendParametersGroup $data
     *            object with the needed data to recommend the product
     *
     * @return Status|NULL
     */
    public function recommend(RecommendParametersGroup $data = null): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::RECOMMEND)->method(self::POST)->body($data)
                    ->build()
            ),
            Status::class
        );
    }

    /**
     * Send an email with a query related to the product that matches the given id
     *
     * @param int $id
     * @param QueryParametersGroup $data
     *            object with the needed data to send the query
     * @param string $dataValidatior
     *            Data validatior PId to apply
     *
     * @return Status|NULL
     */
    public function query(int $id = 0, QueryParametersGroup $data = null, string $dataValidatior = ''): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::PRODUCTS_ID_PRODUCT_QUERY)->method(self::POST)->pathParams(['id' => $id])
                    ->headers(strlen($dataValidatior) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidatior] : [])
                    ->body($data)
                    ->build()
            ),
            Status::class
        );
    }

    /**
     * Add the request to get the products filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param ProductsParametersGroup $params
     *            object with the needed filters to send to the API products resource
     *
     * @return void
     */
    public function addGetProducts(BatchRequests $batchRequests, string $batchName, ProductsParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::PRODUCTS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the product identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetProduct(BatchRequests $batchRequests, string $batchName, int $id, ProductParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::PRODUCTS_ID)->pathParams(['id' => $id])->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the product reward points by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetProductRewardPoints(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::PRODUCTS_ID_REWARD_POINTS)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the rich snippets for the product identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetProductRichSnippets(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::PRODUCTS_ID_RICH_SNIPPETS)->pathParams(['id' => $id])
                ->build()
        );
    }

    /**
     * Add the request to get the discounts for the products filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param ProductsDiscountsParametersGroup $params
     *            object with the needed filters to send to the API products discounts resource
     *
     * @return ElementCollection|NULL
     */
    public function addGetProductsDiscounts(BatchRequests $batchRequests, string $batchName, ProductsDiscountsParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::PRODUCTS_DISCOUNTS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the discounts for the product identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     * @param ProductDiscountsParametersGroup $params
     *
     * @return ElementCollection|NULL
     */
    public function addGetProductDiscounts(BatchRequests $batchRequests, string $batchName, int $id = 0, ProductsDiscountsParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::PRODUCTS_ID_DISCOUNTS)->pathParams(['id' => $id])->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the top sellers products filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param TopSellersParametersGroup $params
     *            object with the needed filters to send to the API products/topSellers resource
     *
     * @return void
     */
    public function addGetTopSellers(BatchRequests $batchRequests, string $batchName, TopSellersParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::PRODUCTS_TOP_SELLERS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get product comments filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     * @param CommentsParametersGroup $params
     *            object with the needed filters to send to the API products/comments resource
     *
     * @return void
     */
    public function addGetComments(
        BatchRequests $batchRequests,
        string $batchName,
        int $id,
        CommentsParametersGroup $params = null
    ): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::PRODUCTS_ID_COMMENTS)->pathParams(['id' => $id])->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to get product bundle definitions filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     * @param BundleDefinitionsParametersGroup $params
     *            object with the needed filters to send to the API /products/{id}/bundleDefinitions resource
     *
     * @return void
     */
    public function addGetBundleDefinitions(
        BatchRequests $batchRequests,
        string $batchName,
        int $id,
        BundleDefinitionsParametersGroup $params = null
    ): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::PRODUCTS_ID_BUNDLE_DEFINITIONS)->pathParams(['id' => $id])->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to get product bundle definitions groupings filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     * @param int $bundleDefinitionId
     * @param BundleDefinitionsGroupingsParametersGroup $params
     *            object with the needed filters to send to the API /products/{id}/bundleDefinitions/{bundleDefinitionId}/groupings	resource
     *
     * @return void
     */
    public function addGetBundleDefinitionsGroupings(
        BatchRequests $batchRequests,
        string $batchName,
        int $id,
        int $bundleDefinitionId = 0,
        BundleDefinitionsGroupingsParametersGroup $params = null
    ): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::PRODUCTS_ID_BUNDLE_DEFINITIONS_BUNDLE_ID_GROUPINGS)->pathParams(['id' => $id, 'bundleDefinitionId' => $bundleDefinitionId])->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to get products linked to the product specified
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *      the name that will identify the request on the batch return.
     * @param int $id
     * @param LinkedParametersGroup $params
     *            object with the needed filters to send to the API /products/{id}/linked resource
     *
     * @return void
     */
    public function addGetLinkedProducts(
        BatchRequests $batchRequests,
        string $batchName,
        int $id,
        LinkedParametersGroup $params = null
    ): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::PRODUCTS_ID_LINKED)->pathParams(['id' => $id])->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to get the information for each product contained in the product comparison.
     *
     * @return void
     */
    public function addGetProductComparison(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::PRODUCT_COMPARISON)
                ->build()
        );
    }

    /**
     * Get current data product for the given params
     *
     * @param GetCombinationDataParametersGroup $params
     *
     * @return ProductCombinationData|NULL
     */
    public function getCombinationData(int $id, GetCombinationDataParametersGroup $params = null): ?ProductCombinationData {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::PRODUCTS_ID_COMBINATION_DATA)->method(self::POST)->pathParams(['id' => $id])->body($params)->build()
            ),
            ProductCombinationData::class
        );
    }

    /**
     * Get current data bundle definition for the given params
     *
     * @param GetBundleDefinitionsGroupingsCombinationDataParametersGroup $params
     *
     * @return BundleCombinationData|NULL
     */
    public function getBundleDefinitionsGroupingsCombinationData(GetBundleDefinitionsGroupingsCombinationDataParametersGroup $params = null): ?BundleCombinationData {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::PRODUCTS_BUNDLE_DEFINITIONS_GROUPINGS_COMBINATION_DATA)->method(self::POST)->body($params)->build()
            ),
            BundleCombinationData::class
        );
    }
}
