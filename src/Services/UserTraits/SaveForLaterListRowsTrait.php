<?php

declare(strict_types=1);

namespace SDK\Services\UserTraits;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\IncidenceSaveForLaterListRowsCollection;
use SDK\Core\Dtos\Status;
use SDK\Core\Enums\Resource;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\User\SaveForLaterListRow;
use SDK\Services\Parameters\Groups\User\AddSaveForLaterListRowsParametersGroup;
use SDK\Services\Parameters\Groups\User\SaveForLaterListRowsParametersGroup;

/**
 * This is the user SaveForLaterListRows trait.
 * The methods that manage SaveForLaterListRows requests to the API will be located here.
 *
 * @see SaveForLaterListRowsTrait::getSaveForLaterListRows()
 * @see SaveForLaterListRowsTrait::addSaveForLaterListRows()
 * @see SaveForLaterListRowsTrait::deleteSaveForLaterListRow()
 * @see SaveForLaterListRowsTrait::addGetSaveForLaterListRows()
 * @see BatchRequests
 *
 * @package SDK\Services\UserTraits
 */
trait SaveForLaterListRowsTrait {

    /**
     * Get the set of the shopping lists of the session's user by applying the specified filters, sort and pagination. Valid only if the user is logged in.
     *
     * @return ElementCollection|NULL
     */
    public function getSaveForLaterListRows(SaveForLaterListRowsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(SaveForLaterListRow::class, Resource::USER_SAVE_FOR_LATER_LIST_ROWS, $params);
    }

    /**
     * Create a shoppingList for the user of the session. Valid only if the user is logged in.
     *
     * @param AddSaveForLaterListRowsParametersGroup $data
     *
     * @return IncidenceSaveForLaterListRowsCollection|NULL
     */
    public function addSaveForLaterListRows(AddSaveForLaterListRowsParametersGroup $data): ?IncidenceSaveForLaterListRowsCollection {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::USER_SAVE_FOR_LATER_LIST_ROWS)->method(self::POST)->body($data)->build()),
            IncidenceSaveForLaterListRowsCollection::class
        );
    }

    /**
     * Delete the specified shopping list from the user of the session. Valid only if the user is logged in.
     *
     * @param int $id
     *
     * @return Status|NULL
     */
    public function deleteSaveForLaterListRow(int $id): ?Status {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::USER_SAVE_FOR_LATER_LIST_ROWS_ID)->method(self::DELETE)->pathParams(['id' => $id])->build()),
            Status::class
        );
    }

    /**
     * Add the request to get the set of the shopping lists of the session's user by applying the specified filters, sort and pagination. Valid only if the user is logged in.
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetSaveForLaterListRows(BatchRequests $batchRequests, string $batchName, SaveForLaterListRowsParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::USER_SAVE_FOR_LATER_LIST_ROWS)->urlParams($params)->build()
        );
    }

    /**
     * Transfer to basket the given save for later row id
     *
     * @param int $id
     *
     * @return Status|NULL
     */
    public function transferToBasketSaveForLaterListRow(int $id): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::USER_SAVE_FOR_LATER_LIST_ROWS_ID_TRANSFER_TO_BASKET)->method(self::POST)->pathParams(['id' => $id])->build()
            ),
            Status::class
        );
    }
}
