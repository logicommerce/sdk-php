<?php declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Exceptions\InvalidParameterException;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Catalog\RelatedItems;
use SDK\Enums\RelatedItemsType;
use SDK\Services\Parameters\Groups\RelatedItemsParametersGroup;

/**
 * This is the main Related items trait.
 * The way a object should connect to the API and get related items will be stted in this trait.
 *
 * @see RelatedItemsTrait::getRelatedItems()
 * @see RelatedItems
 *
 * @see RelatedItemsTrait::addGetRelatedItems()
 * @see BatchRequests
 *
 * @package SDK\Services
 */
trait RelatedItemsTrait {

    /**
     * Returns the related items assigned to the given item id
     *
     * @param int $id
     * @param string $type
     *            Optional. This param will set the kind of related we want to retrieve. Valid values are inside RelatedItemsType class.
     *            If not given all the related items will be returned inside the RelatedItems object.
     * @param RelatedItemsParametersGroup $params
     *            object with the needed filters to send to the API resource
     *
     * @return ElementCollection|NULL
     * @throws InvalidParameterException
     */
    public function getRelatedItems(int $id = 0, string $type = '', RelatedItemsParametersGroup $params = null): ?ElementCollection {
        if ($id <= 0) {
            return null;
        }
        return $this->getResponse(
            $this->getConnection()->doRequest(
                (new RequestBuilder())
                    ->path($this->getRelatedItemsResource($type))
                    ->pathParams(['id' => $id, 'type' => strtolower($type)])
                    ->urlParams($params)
                ->build()
            ),
            RelatedItems::class
        );
    }

    /**
     * Add the request to get the related items assigned to the given item id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     * @param string $type
     *            Optional. This param will set the kind of related we want to retrieve. Valid values are inside RelatedItemsType class.
     *            If not given all the related items will be returned inside the RelatedItems object.
     * @param RelatedItemsParametersGroup $params
     *            object with the needed filters to send to the API resource
     *
     * @return void
     * @throws InvalidParameterException
     */
    public function addGetRelatedItems(
        BatchRequests $batchRequests, string $batchName, int $id, string $type = '', RelatedItemsParametersGroup $params = null
    ): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)
                ->path($this->getRelatedItemsResource($type))
                ->pathParams(['id' => $id, 'type' => strtolower($type)])
                ->urlParams($params)
            ->build()
        );
    }

    private function getRelatedItemsResource(string $type): string {
        $resource = self::RELATED_ITEMS;
        if (strlen(trim($type)) !== 0) {
            if (!RelatedItemsType::isValid($type)) {
                throw new InvalidParameterException(
                    'Invalid value "' . $type . '" for parameter "type"', InvalidParameterException::INVALID_PARAMETER_VALUE
                );
            }
            $resource = self::RELATED_ITEMS_TYPE;
        }
        return $resource;
    }
}
