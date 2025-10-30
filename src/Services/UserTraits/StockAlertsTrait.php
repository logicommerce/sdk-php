<?php declare(strict_types=1);

namespace SDK\Services\UserTraits;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\Status;
use SDK\Core\Enums\Resource;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\User\UserStockAlert;

/**
 * This is the user stock alerts trait.
 * The methods that manage stock alerts requests to the API will be located here.
 *
 * @see StockAlertsTrait::getStockAlerts()
 * @see StockAlertsTrait::deleteStockAlerts()
 * @see UserStockAlert
 *
 * @see StockAlertsTrait::addGetStockAlerts()
 * @see StockAlertsTrait::addDeleteStockAlerts()
 * @see BatchRequests
 *
 * @package SDK\Services\UserTraits
 */
trait StockAlertsTrait {

    /**
     * Returns the areas filtered with the given parameters
     *
     * @return ElementCollection|NULL
     */
    public function getStockAlerts(): ?ElementCollection {
        return $this->getElements(UserStockAlert::class, Resource::USER_STOCK_ALERTS);
    }

    /**
     * Delete the user address identified by the given id
     *
     * @param int $id
     *
     * @return Status|NULL
     */
    public function deleteStockAlerts(int $id): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::USER_STOCK_ALERTS_ID)->method(self::DELETE)->pathParams(['id' => $id])->build()
            ),
            Status::class
        );
    }

    /**
     * Add the request to get the areas filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetStockAlerts(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::USER_STOCK_ALERTS)->build());
    }
}
