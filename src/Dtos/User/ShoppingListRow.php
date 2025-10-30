<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Core\Dtos\Factories\ListRowReferenceFactory;
use SDK\Core\Resources\Date;
use SDK\Enums\Importance;

/**
 * This is the user shopping list row main class.
 * The user shopping list information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ShoppingListRow::getReference()
 * @see ShoppingListRow::getAddedDate()
 * @see ShoppingListRow::getQuantity()
 * @see ShoppingListRow::getComment()
 * @see ShoppingListRow::getImportance()
 * @see ShoppingListRow::getPriority()
 * @see ShoppingListRow::getShoppingListId()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\User
 */
class ShoppingListRow extends Element {
    use ElementTrait, IdentifiableElementTrait, EnumResolverTrait, IntegrableElementTrait;

    protected ?ListRowReference $reference = null;

    protected ?Date $addedDate = null;

    protected int $quantity = 0;

    protected string $comment = '';

    protected string $importance = '';

    protected int $priority = 0;

    protected int $shoppingListId = 0;

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

    /**
     * Comment of the shopping list row.
     *
     * @return string
     */
    public function getComment(): string {
        return $this->comment;
    }

    /**
     * Specifies the importance of this shopping list row over the rest.
     *
     * @return string
     */
    public function getImportance(): string {
        return $this->getEnum(ElementType::class, $this->importance, Importance::MEDIUM);
    }

    /**
     * Specifies the order of presentation of this item in relation to the rest of items of the same type.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Specifies the internal identifier of the shopping list this row belongs to.
     *
     * @return int
     */
    public function getShoppingListId(): int {
        return $this->shoppingListId;
    }
}
