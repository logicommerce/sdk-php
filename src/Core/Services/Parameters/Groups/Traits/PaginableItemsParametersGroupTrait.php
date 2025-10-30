<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Groups\Traits;

/**
 * This is the paginable items parameters group trait.
 *
 * @package SDK\Core\Services\Parameters\Groups\Traits
 */
trait PaginableItemsParametersGroupTrait {

    protected int $perPage;

    protected int $page;

    /**
     * Sets the per page parameter for this parameters group.
     *
     * @param int $perPage
     *
     * @return void
     */
    public function setPerPage(int $perPage): void {
        $this->perPage = $perPage;
    }

    /**
     * Sets the page parameter for this parameters group.
     *
     * @param int $page
     *
     * @return void
     */
    public function setPage(int $page): void {
        $this->page = $page;
    }
}
