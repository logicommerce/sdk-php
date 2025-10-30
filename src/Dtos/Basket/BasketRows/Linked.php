<?php

namespace SDK\Dtos\Basket\BasketRows;

/**
 * This is the basket linked class.
 * The basket linkeds information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Product
 *
 * @package SDK\Dtos\Basket\BasketRows
 */
class Linked extends Product {

    protected int $sectionId = 0;

    protected int $parentId = 0;

    protected ?string $parentHash = null;

    /**
     * Sets the sectionId.
     *
     * @return int
     */
    public function getSectionId(): int {
        return $this->sectionId;
    }

    /**
     * Sets the parentId.
     *
     * @return int
     */
    public function getParentId(): int {
        return $this->parentId;
    }

    /**
     * Sets the parentHash.
     *
     * @return string
     */
    public function getParentHash(): ?string {
        return $this->parentHash;
    }

}
