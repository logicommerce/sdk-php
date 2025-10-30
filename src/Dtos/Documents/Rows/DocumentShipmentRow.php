<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the document shipment row class.
 * The document shipment row will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentShipmentRow::getQuantity()
 * @see DocumentShipmentRow::getOrderDetailId()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos\Documents\Rows
 */
class DocumentShipmentRow extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected int $quantity = 0;

    protected int $orderDetailId = 0;

    /**
     * Returns number of units of the item.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * Returns internal identifier of the document detail line.
     *
     * @return int
     */
    public function getOrderDetailId(): int {
        return $this->orderDetailId;
    }
}
