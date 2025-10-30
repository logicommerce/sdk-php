<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\Traits\IdentifiableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Basket\AddLinkedParametersValidator;

/**
 * This is the basket model (add linked resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class AddLinkedParametersGroup extends ProductParametersGroup {
    use IdentifiableItemsParametersGroupTrait;

    protected string $mode;

    protected int $sectionId;

    protected ?string $parentHash = null;

    /**
     * Sets the mode parameter for this parameters group.
     *
     * @param string $mode
     *
     * @return void
     */
    public function setMode(string $mode): void {
        $this->mode = $mode;
    }

    /**
     * Sets the internal identifier of the linked items section.
     *
     * @param int $sectionId
     *
     * @return void
     */
    public function setSectionId(int $sectionId): void {
        $this->sectionId = $sectionId;
    }

    /**
     * Sets the parent hash.
     *
     * @param string $parentHash
     *
     * @return void
     */
    public function setParentHash(string $parentHash): void {
        $this->parentHash = $parentHash;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AddLinkedParametersValidator {
        return new AddLinkedParametersValidator();
    }
}
