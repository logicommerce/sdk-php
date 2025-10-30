<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Pagination class.
 * The pagination of the current navigation items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Pagination::getPage()
 * @see Pagination::getPerPage()
 * @see Pagination::getTotalItems()
 * @see Pagination::getTotalPages()
 *
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos
 */
class Pagination {
    use ElementTrait;

    protected int $page = 0;

    protected int $perPage = 0;

    protected int $totalItems = 0;

    protected int $totalPages = 0;

    /**
     * Returns the current page of the pagination.
     *
     * @return int
     */
    public function getPage(): int {
        return $this->page;
    }

    /**
     * Returns the number of items per page on the current pagination.
     *
     * @return int
     */
    public function getPerPage(): int {
        return $this->perPage;
    }

    /**
     * Returns the total number of items on the current pagination.
     *
     * @return int
     */
    public function getTotalItems(): int {
        return $this->totalItems;
    }

    /**
     * Returns the total number of pages on the current pagination.
     *
     * @return int
     */
    public function getTotalPages(): int {
        return $this->totalPages;
    }

    public function merge(Pagination $pagination): void {
        $this->totalItems += $pagination->getTotalItems();
        $this->page = 1;
        $this->perPage;
        $this->totalPages = intval(ceil($this->totalItems / $this->perPage));
    }

    public function addOne(): void {
        $this->totalItems += 1;
        $this->page = 1;
        $this->perPage;
        $this->totalPages = intval(ceil($this->totalItems / $this->perPage));
    }

    public function removeOne(): void {
        $this->totalItems -= 1;
        $this->page = 1;
        $this->perPage;
        $this->totalPages = intval(ceil($this->totalItems / $this->perPage));
    }
}
