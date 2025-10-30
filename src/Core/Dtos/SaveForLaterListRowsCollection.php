<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

use FWK\Dtos\Catalog\BundleGrouping;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Catalog\Product\Product;

/**
 * This is the SaveForLaterListRowsCollection class
 *
 * @see SaveForLaterListRowsCollection::getProducts()
 *
 * @see ElementCollection
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos
 */
class SaveForLaterListRowsCollection extends ElementCollection {
    use ElementTrait;

    protected array $products = [];

    protected array $bundles = [];

    /**
     * Returns the products
     *
     * @return array|Product
     */
    public function getProducts(): array {
        return $this->products;
    }

    public function setProducts(array $products): void {
        $this->products = $this->setArrayField($products, Product::class);
    }

    /**
     * Returns the bundles
     *
     * @return array|BundleGrouping
     */
    public function getBundles(): array {
        return $this->bundles;
    }

    public function setBundles(array $bundles): void {
        $this->bundles = $this->setArrayField($bundles, BundleGrouping::class);
    }
}
