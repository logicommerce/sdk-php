<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\AddShoppingListParametersValidator;

/**
 * This is the add shopping list parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 * 
 * @see ParametersGroup
 * 
 * @uses ElementNameTrait
 * @uses ElementDescriptionTrait
 */
class AddShoppingListParametersGroup extends ParametersGroup {

    protected string $name;

    protected string $description;

    protected bool $keepPurchasedItems;

    protected bool $defaultOne;

    protected int $priority;

    /**
     * Name of the shopping list. Must be different to empty string or only spaces.
     *
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * Description of the shopping list.
     *
     * @param string $description
     *
     * @return void
     */
    public function setDescription(string $description): void {
        $this->description = $description;
    }

    /**
     * Specifies whether the rows of the shopping list are automatically deleted from the shopping list when their items are purchased though them.
     *
     * @param bool $keepPurchasedItems
     *
     * @return void
     */
    public function setKeepPurchasedItems(bool $keepPurchasedItems): void {
        $this->keepPurchasedItems = $keepPurchasedItems;
    }

    /**
     * Sets this shopping list as the default one. There should always be a default list.
     *
     * @param bool $defaultOne
     *
     * @return void
     */
    public function setDefaultOne(bool $defaultOne): void {
        $this->defaultOne = $defaultOne;
    }

    /**
     * Specifies the order of presentation of this item in relation to the rest of items of the same type.
     *
     * @param int $priority
     *
     * @return void
     */
    public function setPriority(int $priority): void {
        $this->priority = $priority;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AddShoppingListParametersValidator {
        return new AddShoppingListParametersValidator();
    }
}
