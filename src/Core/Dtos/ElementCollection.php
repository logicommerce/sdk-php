<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Factories\BasketDeliveryFactory;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Filter\Filter;
use SDK\Dtos\Accounts\AccountOrder;
use SDK\Dtos\Basket\BasketPickingDelivery;
use SDK\Dtos\Basket\Delivery;
use SDK\Dtos\Catalog\BundleGrouping;
use SDK\Dtos\Catalog\PhysicalLocation;
use SDK\Dtos\Currency;
use SDK\Dtos\User\SaveForLaterListRow;
use SDK\Dtos\User\ShoppingListRow;

/**
 * This is the main collection class
 *
 * @see ElementTrait
 * 
 * @see Element
 *
 * @package SDK\Core\Dtos
 */
class ElementCollection extends Element implements \Iterator, \Countable {
    use ElementTrait;

    protected array $items = [];

    protected ?Pagination $pagination = null;

    protected ?Element $filter = null;

    protected int $index = 0;

    /**
     * Added to comply the \Iterator interface.
     * Returns the current element on the iteration.
     *
     * @return mixed
     */
    public function current(): mixed {
        return $this->items[$this->index];
    }

    /**
     * Added to comply the \Iterator interface.
     * Moves the cursor one element forward.
     *
     * @return void
     */
    public function next(): void {
        $this->index++;
    }

    /**
     * Added to comply the \Iterator interface.
     * Returns the current key on the iteration.
     *
     * @return int
     */
    public function key(): int {
        return $this->index;
    }

    /**
     * Added to comply the \Iterator interface.
     * Returns if the current element on the iteration is defined.
     *
     * @return bool
     */
    public function valid(): bool {
        return isset($this->items[$this->key()]);
    }

    /**
     * Added to comply the \Iterator interface.
     * Moves the cursor to the beggining.
     *
     * @return void
     */
    public function rewind(): void {
        $this->index = 0;
    }

    /**
     * Reverse the order of the collection.
     *
     * @return void
     */
    public function reverse(): void {
        $this->items = array_reverse($this->items);
        $this->rewind();
    }

    /**
     * Added to comply the \Countable interface.
     * Returns the number of elements on the collection.
     *
     * @return int
     */
    public function count(): int {
        return count($this->items);
    }

    /**
     * Returns the elements on the collection.
     *
     * @return Element[]
     */
    public function getItems(): array {
        return $this->items;
    }

    /**
     * Returns the pagination object of this collection.
     *
     * @return Pagination
     */
    public function getPagination(): ?Pagination {
        return $this->pagination;
    }

    protected function setPagination(array $pagination): void {
        $this->pagination = new Pagination($pagination);
    }

    /**
     * Returns the filter object of this collection.
     *
     * @return Element
     */
    public function getFilter(): ?Element {
        return $this->filter;
    }

    protected function setFilter(array $filter): void {
        $this->filter = new Filter($filter);
    }

    /**
     * Merge the provided ElementCollection with this collection.
     *
     * @param ElementCollection $elementCollection The collection to merge with.
     */
    public function merge(ElementCollection $elementCollection, ?Element $filter = null): void {
        $this->items = array_merge($this->items, $elementCollection->getItems());
        if (!is_null($this->pagination) && !is_null($elementCollection->getPagination())) {
            $this->pagination->merge($elementCollection->getPagination());
        }
        if (!is_null($filter)) {
            $this->filter = $filter;
        }
    }

    /**
     * Add a Element to this collection.
     *
     * @param Element $elementCollection The collection to merge with.
     */
    public function add(Element $element): void {
        $this->items[] = $element;
        $this->pagination->addOne();
    }

    /**
     * Remove a Element to this collection. If remove elements inside of a loop, the index will be reseted oustide of the loop.
     *
     * @param int $position in the collection to remove from.
     * @param bool $resetIndex reset index after remove, default value is true.
     */
    public function remove(int $position, bool $resetIndex = true): void {
        unset($this->items[$position]);
        $this->pagination->removeOne();
        if ($resetIndex) {
            $this->resetIndex();
        }
    }

    /**
     * Reset the indexes of the collection array.
     */
    public function resetIndex(): void {
        $this->items = array_values($this->items);
        $this->index = 0;
    }


    public static function getCollectionClass(array $data, string $class) {
        if (isset($data['rating'])) {
            return ProductCommentCollection::class;
        } elseif (isset($data['module'])) {
            return UserPluginPaymentTokenCollection::class;
        } elseif (isset($data['salesAgentTotals'])) {
            return SalesAgentSales::class;
        } elseif ($class === BundleGrouping::class && isset($data['products'])) {
            return BundleGroupingCollection::class;
        } elseif ($class === ShoppingListRow::class && (isset($data['products']) || isset($data['bundles']))) {
            return ShoppingListRowsCollection::class;
        } elseif ($class === SaveForLaterListRow::class && (isset($data['products']) || isset($data['bundles']))) {
            return SaveForLaterListRowsCollection::class;
        } elseif ($class === ShoppingListRow::class && (isset($data['incidences']))) {
            return IncidenceShoppingListRowsCollection::class;
        } elseif ($class === SaveForLaterListRow::class && (isset($data['incidences']))) {
            return IncidenceSaveForLaterListRowsCollection::class;
        } elseif ($class === Currency::class && (isset($data['countries']))) {
            return CountryCurrenciesCollection::class;
        } elseif ($class === PhysicalLocation::class) {
            return PhysicalLocationsCollection::class;
        } elseif ($class === BasketDeliveryFactory::class || $class === BasketPickingDelivery::class) {
            return DeliveriesCollection::class;
        } elseif ($class === AccountOrder::class && (isset($data['accounts']))) {
            return AccountOrderCollection::class;
        }
        return ElementCollection::class;
    }
}
