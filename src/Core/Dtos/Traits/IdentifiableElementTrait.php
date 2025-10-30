<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the identifiable elements trait.
 * This trait will be used by elements that can be identified (that means that they have a id).
 *
 * @see IdentifiableElementTrait::getId()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait IdentifiableElementTrait {

    /**
     * Autonumeric element id.
     * All the given elements by the LogiCommerce API will send it.
     *
     * @var int
     */
    protected int $id = 0;

    /**
     * Returns the element id.
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }
}
