<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Groups\Traits;

/**
 * This is the identifiable parameters group trait.
 *
 * @package SDK\Core\Services\Parameters\Groups\Traits
 */
trait IdentifiableItemsParametersGroupTrait {

    protected int $id;

    /**
     * Sets the internal identifier parameter for this parameters group.
     *
     * @param int $id
     *
     * @return void
     */
    public function setId(int $id): void {
        $this->id = $id;
    }
}
