<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\ShoppingListRowDeleteItemType;

/**
 * This is the user shopping list row main class.
 * The user shopping list information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ShoppingListRowDeleteItem::getType()
 *
 * @see Element
 * 
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 * @uses EnumResolverTrait
 *
 * @package SDK\Dtos\User
 */
class ShoppingListRowDeleteItem extends Element {
    use ElementTrait, IdentifiableElementTrait, EnumResolverTrait;

    protected string $type = '';

    /**
     * Specifies the type of this shopping list row.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(ElementType::class, $this->type, ShoppingListRowDeleteItemType::SHOPPING_LIST_ROW);
    }
}
