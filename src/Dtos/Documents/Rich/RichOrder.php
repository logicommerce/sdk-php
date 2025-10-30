<?php

namespace SDK\Dtos\Documents\Rich;

/**
 * The rich order document.
 * The rich order document is a document that represents an order.
 * 
 * @see getAdditionalItems
 * 
 * @see RichDocument
 * 
 * @package SDK\Dtos\Documents\Rich
 */
class RichOrder extends RichDocument {
    
    /**
     * Returns the rich document additionalItems.
     *
     * @deprecated
     * @return RichDocumentAdditionalItem[]
     */
    public function getAdditionalItems(): array {
        return $this->additionalItems;
    }

    /**
     * @deprecated
     */
    protected function setAdditionalItems(array $additionalItems): void {
        $this->additionalItems = $this->setArrayField($additionalItems, RichDocumentAdditionalItem::class);
    }
}