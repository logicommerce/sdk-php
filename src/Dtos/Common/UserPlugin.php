<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementModuleTrait;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the User Plugin class.
 * The API plugins will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserPlugin::getProperties()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementModuleTrait
 *
 * @package SDK\Dtos\Common
 */
class UserPlugin extends Element {
    use ElementTrait, ElementModuleTrait;

    protected array $properties = [];

    /**
     * Returns the plugin properties.
     *
     * @return array
     */
    public function getProperties(): array {
        return $this->properties;
    }

    protected function setProperties(array $properties): void {
        $this->properties = $this->setArrayField($properties, UserPluginProperty::class);
    }
}
