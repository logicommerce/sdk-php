<?php declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Catalog\Product\Product;

/**
 * This is the BundleGroupingCollection class
 *
 * @see BundleGroupingCollection::getProducts()
 *
 * @see ElementCollection
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos
 */
class BundleGroupingCollection extends ElementCollection {
    use ElementTrait;

    protected array $products = [];

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

}
