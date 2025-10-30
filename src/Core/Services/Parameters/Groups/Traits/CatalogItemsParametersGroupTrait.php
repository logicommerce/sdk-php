<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Groups\Traits;

/**
 * This is the catalog items parameters group trait.
 *
 * @package SDK\Core\Services\Parameters\Groups\Traits
 */
trait CatalogItemsParametersGroupTrait {
    use IdentifiableItemsParametersGroupTrait, SortableItemsParametersGroupTrait;

    protected string $pId;

    protected string $idList;

    /**
     * Sets the public identifier parameter for this parameters group.
     *
     * @param string $pId
     *
     * @return void
     */
    public function setPId(string $pId): void {
        $this->pId = $pId;
    }

    /**
     * Sets a list of internal identifiers for this parameters group.
     *
     * @param string $idList
     *
     * @return void
     */
    public function setIdList(string $idList): void {
        $this->idList = $idList;
    }
}
