<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Factories\ListRowReferenceFactory;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Resources\Date;

/**
 * This is the user save for later list main class.
 * The user save for later list information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see SaveForLaterListRow::getReference()
 * @see SaveForLaterListRow::getAddedDate()
 * @see SaveForLaterListRow::getQuantity()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\User
 */
class SaveForLaterListRow extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected ?ListRowReference $reference = null;

    protected ?Date $addedDate = null;

    protected int $quantity = 0;

    /**
     * Get the reference
     *
     * @return NULL|ListRowReference
     */
    public function getReference(): ?ListRowReference {
        return $this->reference;
    }

    protected function setReference(array $reference): void {
        $this->reference = ListRowReferenceFactory::getListRowReference($reference);
    }

    /**
     * Specifies the date time the shopping list row was added. Format ISO-8601 ('YYYY-MM-DDThh:mm:ssZ').
     *
     * @return NULL|Date
     */
    public function getAddedDate(): ?Date {
        return $this->addedDate;
    }

    protected function setAddedDate(string $addedDate): void {
        $this->addedDate = Date::create($addedDate);
    }

    /**
     * Required quantity of the shopping list row.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }
}
