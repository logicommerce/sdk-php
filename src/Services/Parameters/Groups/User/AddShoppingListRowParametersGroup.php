<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\AddShoppingListRowParametersValidator;

/**
 * This is the add shopping list row parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class AddShoppingListRowParametersGroup extends ParametersGroup {

    protected string $comment;

    protected int $priority;

    protected int $quantity;

    protected string $importance;

    protected int $shoppingListId;

    protected ?AddShoppingListRowReferenceParametersGroup $reference = null;

    /**
     * Comment of the shopping list row.
     *
     * @param string $comment
     *
     * @return void
     */
    public function setComment(string $comment): void {
        $this->comment = $comment;
    }

    /**
     * Specifies the order of presentation of this shopping list row in relation to the rest of shopping list rows of the shopping list. It must be a value between 1 and the total quantity of shopping list rows of the shopping list.
     *
     * @param int $priority
     *
     * @return void
     */
    public function setPriority(int $priority): void {
        $this->priority = $priority;
    }

    /**
     * Required quantity of the shopping list row. It must be greater or equal to 1.
     *
     * @param int $quantity
     *
     * @return void
     */
    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

    /**
     * Specifies the importance of this shopping list row over the rest. Enum Importance: "LOWEST" "LOW" "MEDIUM" "HIGH" "HIGHEST"
     *
     * @param string $importance
     *
     * @return void
     */
    public function setImportance(string $importance): void {
        $this->importance = $importance;
    }

    /**
     * Information about the referenced item.
     *
     * @param AddShoppingListRowReferenceParametersGroup $reference
     *
     * @return void
     */
    public function setReference(AddShoppingListRowReferenceParametersGroup $reference): void {
        $this->reference = $reference;
    }

    /**
     * Specifies the internal identifier of the shopping list this row belongs to. It must be one of the registered user.
     *
     * @param int $shoppingListId
     *
     * @return void
     */
    public function setShoppingListId(int $shoppingListId): void {
        $this->shoppingListId = $shoppingListId;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AddShoppingListRowParametersValidator {
        return new AddShoppingListRowParametersValidator();
    }
}
