<?php

declare(strict_types=1);

namespace SDK\Services\UserTraits;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\IncidencesDeleteItem;
use SDK\Core\Dtos\Status;
use SDK\Core\Enums\Resource;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\User\ShoppingList;
use SDK\Dtos\User\ShoppingListRow;
use SDK\Services\Parameters\Groups\User\AddShoppingListParametersGroup;
use SDK\Services\Parameters\Groups\User\AddShoppingListRowParametersGroup;
use SDK\Services\Parameters\Groups\User\AddShoppingListRowsParametersGroup;
use SDK\Services\Parameters\Groups\User\DeleteShoppingListRowsParametersGroup;
use SDK\Services\Parameters\Groups\User\ShoppingListsParametersGroup;
use SDK\Services\Parameters\Groups\User\ShoppingListRowsParametersGroup;

/**
 * This is the user ShoppingLists trait.
 * The methods that manage ShoppingLists requests to the API will be located here.
 *
 * @see ShoppingListsTrait::getShoppingLists()
 * @see ShoppingListsTrait::addShoppingListsProduct()
 * @see ShoppingListsTrait::deleteShoppingListsProduct()
 *
 * @see ShoppingListsTrait::addGetShoppingLists()
 * @see BatchRequests
 *
 * @package SDK\Services\UserTraits
 */
trait ShoppingListsTrait {

    /**
     * Get the set of the shopping lists of the session's user by applying the specified filters, sort and pagination. Valid only if the user is logged in.
     *
     * @return ElementCollection|NULL
     */
    public function getShoppingLists(ShoppingListsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(ShoppingList::class, Resource::ACCOUNTS_SHOPPING_LISTS, $params);
    }

    /**
     * Create a shoppingList for the user of the session. Valid only if the user is logged in.
     *
     * @param AddShoppingListParametersGroup $data
     *
     * @return ShoppingList|NULL
     */
    public function createShoppingList(AddShoppingListParametersGroup $data): ?ShoppingList {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ACCOUNTS_SHOPPING_LISTS)->method(self::POST)->body($data)->build()),
            ShoppingList::class
        );
    }

    /**
     * Update the specified shoppingList of the user of the session. Valid only if the user is logged in.
     *
     * @param AddShoppingListParametersGroup $data
     *
     * @return ShoppingList|NULL
     */
    public function updateShoppingList(int $id, AddShoppingListParametersGroup $data): ?ShoppingList {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::SHOPPING_LISTS_ID)->method(self::PUT)->pathParams(['id' => $id])->body($data)->build()),
            ShoppingList::class
        );
    }

    /**
     * Delete the specified shopping list from the user of the session. Valid only if the user is logged in.
     *
     * @param int $id
     *
     * @return Status|NULL
     */
    public function deleteShoppingList(int $id): ?Status {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::SHOPPING_LISTS_ID)->method(self::DELETE)->pathParams(['id' => $id])->build()),
            Status::class
        );
    }

    /**
     * Get the set of the shopping list rows of the specified shopping list by applying the specified sort and pagination. The shopping list must be one of the logged user ones.
     *
     * @return ElementCollection|NULL
     */
    public function getShoppingListRows(int $id, ShoppingListRowsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(ShoppingListRow::class,  $this->replaceWildcards(Resource::SHOPPING_LISTS_ID_ROWS, ['id' => $id]), $params);
    }

    /**
     * Create the specified shopping list rows to the specified shoppingList of the user of the session. Valid only if the user is logged in.
     *
     * @param int $id
     * @param AddShoppingListRowsParametersGroup $data
     *
     * @return ElementCollection|NULL
     */
    public function createShoppingListRow(int $id, AddShoppingListRowsParametersGroup $data): ?ElementCollection {
        return $this->getResponse(
            $this->call((new RequestBuilder())->path($this->replaceWildcards(Resource::SHOPPING_LISTS_ID_ROWS, ['id' => $id]))->method(self::POST)->body($data)->build()),
            ShoppingListRow::class
        );
    }

    /**
     * Modify the specified shopping list row of the user of the session. Valid only if the user is logged in.
     *
     * @param int $id
     * @param AddShoppingListRowParametersGroup $data
     *
     * @return ShoppingListRow|NULL
     */
    public function updateShoppingListRow(int $id, AddShoppingListRowParametersGroup $data): ?ShoppingListRow {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path($this->replaceWildcards(Resource::SHOPPING_LISTS_ROWS_ID, ['id' => $id]))->method(self::PUT)->body($data)->build()),
            ShoppingListRow::class
        );
    }

    /**
     * Delete the specified shopping list row from the user of the session. Valid only if the user is logged in.
     *
     * @return Status|NULL
     */
    public function deleteShoppingListRow(int $id): ?Status {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path($this->replaceWildcards(Resource::SHOPPING_LISTS_ROWS_ID, ['id' => $id]))->method(self::DELETE)->build()),
            Status::class
        );
    }

    /**
     * Delete the rows of the specified shopping list, that meet the provided criteria. Valid only if the user is logged in.
     *
     * @param DeleteShoppingListRowsParametersGroup $data
     * 
     * @return IncidencesDeleteItem|NULL
     */
    public function deleteShoppingListRows(int $id, DeleteShoppingListRowsParametersGroup $deleteShoppingListRowsParametersGroup): ?IncidencesDeleteItem {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path($this->replaceWildcards(Resource::SHOPPING_LISTS_ID_ROWS_DELETE, ['id' => $id]))->method(self::POST)->body($deleteShoppingListRowsParametersGroup)->build()),
            IncidencesDeleteItem::class
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
    public function addGetShoppingLists(BatchRequests $batchRequests, string $batchName, ShoppingListsParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ACCOUNTS_SHOPPING_LISTS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the set of the shopping list rows of the specified shopping list by applying the specified sort and pagination. The shopping list must be one of the logged user ones.
     *
     * @return ElementCollection|NULL
     */
    public function addGetShoppingListRows(BatchRequests $batchRequests, string $batchName, int $id, ShoppingListRowsParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::SHOPPING_LISTS_ID_ROWS)->pathParams(['id' => $id])->urlParams($params)->build()
        );
    }
}
