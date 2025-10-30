<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * 
 * This is the list row reference bundle item main class.
 * The list row reference bundle item information will be stored in that class and will remain immutable (only get methods are available)
 * 
 * @see ListRowReferenceBundleItem::getItemId()
 * @see ListRowReferenceBundleItem::getOptions()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\User
 */
class ListRowReferenceBundleItem extends Element {
    use ElementTrait;

    protected int $itemId = 0;

    protected array $options = [];

    /**
     * Specifies the internal identifier of the bundle's item.
     * 
     * @return int
     */
    public function getItemId(): int {
        return $this->itemId;
    }

    /**
     * 
     * @return OptionReference[]
     */
    public function getOptions(): array {
        return $this->options;
    }

    protected function setOptions(array $options): void {
        $this->options = $this->setArrayField($options, OptionReference::class);
    }
}
