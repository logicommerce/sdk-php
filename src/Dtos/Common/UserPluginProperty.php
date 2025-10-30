<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\PluginConnectorType;

/**
 * This is the user plugin property class.
 * The API plugin properties will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserPluginProperty::getConnectorType()
 * @see UserPluginProperty::getItemId()
 * @see UserPluginProperty::getValue()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see ElementNameTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Common
 */
class UserPluginProperty extends Element {
    use ElementTrait, IdentifiableElementTrait, ElementNameTrait, EnumResolverTrait;

    protected string $connectorType = '';

    protected int $itemId = 0;

    protected string $value = '';

    protected string $hint = '';

    /**
     * Returns the plugin property definition type.
     *
     * @return string
     */
    public function getConnectorType(): string { // ENUM
        return $this->getEnum(PluginConnectorType::class, $this->connectorType, PluginConnectorType::NONE);
    }

    /**
     * Returns the plugin property item internal identifier.
     *
     * @return int
     */
    public function getItemId(): int {
        return $this->itemId;
    }

    /**
     * Returns the plugin value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the plugin hint.
     *
     * @return string
     */
    public function getHint(): string {
        return $this->hint;
    }
}
