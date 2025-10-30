<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DiscountConditionType;

/**
 * This is the element Discount Condition main class.
 * The elements comments will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BaseDiscountCondition::getType()
 *
 * @see Element
 *
 * @package SDK\Core\Dtos
 */
abstract class BaseDiscountCondition extends Element {
    use IdentifiableElementTrait, EnumResolverTrait;

    protected string $type = '';

    /**
     * Returns the item type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(DiscountConditionType::class, $this->type, '');
    }
}
