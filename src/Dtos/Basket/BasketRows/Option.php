<?php

namespace SDK\Dtos\Basket\BasketRows;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\OptionType;

/**
 * This is the basket product options class.
 * The basket product options information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Option::getRequired()
 * @see Option::getCombinable()
 *
 * @see Element
 * @see ElementNameTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Basket\BasketRows
 */
abstract class Option extends Element {
    use IdentifiableElementTrait, IntegrableElementTrait, ElementNameTrait, EnumResolverTrait;

    protected bool $required = false;

    protected bool $combinable = false;

    protected string $type = '';

    /**
     * Sets if the option is required.
     *
     * @return bool
     */
    public function getRequired(): bool {
        return $this->required;
    }

    /**
     * Sets if the option is combinable.
     *
     * @return bool
     */
    public function getCombinable(): bool {
        return $this->combinable;
    }

    /**
     * Returns the option type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(OptionType::class, $this->type, OptionType::SHORT_TEXT);
    }
}
