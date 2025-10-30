<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document shipment item class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentShipmentItem::getQuantity()
 * @see RichDocumentShipmentItem::getHash()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentShipmentItem extends Element{
    use ElementTrait;
    
    protected int $quantity = 0;

    protected string $hash = '';

    /**
     * Returns the rich document shipment item quantity.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * Returns the rich document shipment item hash.
     *
     * @return string
     */
    public function getHash(): string {
        return $this->hash;
    }

}
