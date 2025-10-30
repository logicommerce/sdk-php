<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

use SDK\Dtos\Documents\Transactions\Returns\DocumentAdditionalItem;

/**
 * This is the date added elements trait.
 *
 * @see DocumentAdditionalItemTrait::getAdditionalItems()
 * @see DocumentAdditionalItemTrait::getSubstatus()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait DocumentAdditionalItemTrait {

    protected array $additionalItems = [];

    protected string $substatus = '';
    
    /**
     * Returns the document additional item.
     *
     * @return DocumentAdditionalItem[]
     */
    public function getAdditionalItems(): array {
        return $this->additionalItems;
    }

    protected function setAdditionalItems(array $additionalItems): void {
        $this->additionalItems = $this->setArrayField($additionalItems, DocumentAdditionalItem::class);
    }

    /**
     * Returns the document additional item substatus.
     *
     * @return string
     */
    public function getSubstatus(): string {
        return $this->substatus;
    }
}
