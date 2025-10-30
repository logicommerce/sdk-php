<?php

declare(strict_types=1);

namespace SDK\Services\UserTraits;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\Status;
use SDK\Core\Enums\Resource;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Catalog\Product\Product;
use SDK\Services\Parameters\Groups\User\SendWishlistParametersGroup;

/**
 * This is the user wishlist trait.
 * The methods that manage wishlist requests to the API will be located here.
 *
 * @see WishlistTrait::getWishlist()
 * @see WishlistTrait::addWishlistProduct()
 * @see WishlistTrait::deleteWishlistProduct()
 * @see WishlistTrait::sendWishlist()
 * @see Product
 *
 * @see WishlistTrait::addGetWishlist()
 * @see BatchRequests
 *
 * @package SDK\Services\UserTraits
 */
trait WishlistTrait {

    /**
     * Returns the areas filtered with the given parameters
     *
     * @return ElementCollection|NULL
     * @deprecated
     */
    public function getWishlist(): ?ElementCollection {
        return $this->getElements(Product::class, Resource::USER_WISHLIST);
    }

    /**
     * Add product to the user wishlist
     *
     * @param int $id
     *            The identifier of the product we want to add to the wishlist
     *
     * @return Status|NULL
     * @deprecated
     */
    public function addWishlistProduct(int $id): ?Status {
        return $this->wishlistAction($id, self::POST);
    }

    /**
     * Remove product to the user wishlist
     *
     * @param int $id
     *            The identifier of the product we want to remove from wishlist
     *
     * @return Status|NULL
     * @deprecated
     */
    public function deleteWishlistProduct(int $id): ?Status {
        return $this->wishlistAction($id, self::DELETE);
    }

    private function wishlistAction(int $id, string $method): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::USER_WISHLIST_PRODUCT_ID)->method($method)->pathParams(['id' => $id])->build()
            ),
            Status::class
        );
    }

    /**
     * Send the newsletter to the given email
     *
     * @param SendWishlistParametersGroup $params
     *
     * @return Status|NULL
     * @deprecated
     */
    public function sendWishlist(SendWishlistParametersGroup $params = null): ?Status {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::USER_WISHLIST_SEND)->method(self::POST)->body($params)->build()),
            Status::class
        );
    }

    /**
     * Add the request to add the request to get the areas filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     * @deprecated
     */
    public function addGetWishlist(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::USER_WISHLIST)->build());
    }
}
