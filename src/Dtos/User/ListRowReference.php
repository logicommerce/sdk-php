<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\ListRowReferenceType;

/**
 * This is the list row reference main class.
 * The list row reference information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ListRowReference::getType()
 *
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 * @uses EnumResolverTrait
 *
 * @package SDK\Dtos\User
 */
abstract class ListRowReference extends Element {
    use ElementTrait, IdentifiableElementTrait, EnumResolverTrait;

    protected string $type = '';

    /**
     * Returns the reference item type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(ListRowReferenceType::class, $this->type, ListRowReferenceType::PRODUCT);
    }
}
