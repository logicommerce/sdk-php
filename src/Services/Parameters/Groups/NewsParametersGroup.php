<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\CatalogItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\NewsParametersValidator;

/**
 * This is the news model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class NewsParametersGroup extends ParametersGroup {
    use CatalogItemsParametersGroupTrait, PaginableItemsParametersGroupTrait;

    protected string $q;

    protected bool $onlyActive;

    protected int $randomItems;

    /**
     * Sets a search query parameter for this parameters group.
     *
     * @param string $q
     *
     * @return void
     */
    public function setQ(string $q): void {
        $this->q = $q;
    }

    /**
     * Sets if the elements will be filtered using this parameters group in function of if they are active or not.
     *
     * @param bool $onlyActive
     *
     * @return void
     */
    public function setOnlyActive(bool $onlyActive): void {
        $this->onlyActive = $onlyActive;
    }

    /**
     * Sets the random items parameter for this parameters group.
     *
     * @param int $randomItems
     *
     * @return void
     */
    public function setRandomItems(int $randomItems): void {
        $this->randomItems = $randomItems;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): NewsParametersValidator {
        return new NewsParametersValidator();
    }
}
