<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\PrevisionType;

/**
 * This is the document row stock class.
 * The document row stocks will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentRowStock::getWarehouseId()
 * @see DocumentRowStock::getWarehouseGroupId()
 * @see DocumentRowStock::getQuantity()
 * @see DocumentRowStock::getMissingStockQuantity()
 * @see DocumentRowStock::getIncomingDate()
 * @see DocumentRowStock::getOffsetDays()
 * @see DocumentRowStock::getPriority()
 * @see DocumentRowStock::getHash()
 * @see DocumentRowStock::getPrevisionType()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rows
 */
class DocumentRowStock extends Element {
    use ElementTrait, IdentifiableElementTrait, EnumResolverTrait;

    protected int $warehouseId = 0;

    protected int $warehouseGroupId = 0;

    protected int $quantity = 0;

    protected int $missingStockQuantity = 0;

    protected string $incomingDate = '';

    protected int $offsetDays = 0;

    protected int $priority = 0;

    protected string $hash = '';

    protected string $previsionType = '';

    /**
     * Returns warehouse internal identifier.
     *
     * @return int
     */
    public function getWarehouseId(): int {
        return $this->warehouseId;
    }

    /**
     * Returns logistic center internal identifier.
     *
     * @return int
     */
    public function getWarehouseGroupId(): int {
        return $this->warehouseGroupId;
    }

    /**
     * Returns the number of product units for which there is not enough stock.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * Returns number of units of the item.
     *
     * @return int
     */
    public function getMissingStockQuantity(): int {
        return $this->missingStockQuantity;
    }

    /**
     * Returns stock provision date, if any.
     *
     * @return string
     */
    public function getIncomingDate(): string {
        return $this->incomingDate;
    }

    /**
     * Returns preparation or compensation days that the warehouse needs before it can supply stock.
     *
     * @return int
     */
    public function getOffsetDays(): int {
        return $this->offsetDays;
    }

    /**
     * Returns the presentation order of this item relative to other items of the same type.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the hash of the item.
     *
     * @return string
     */
    public function getHash(): string {
        return $this->hash;
    }

    /**
     * Returns type of provision, if any.
     *
     * @return string
     */
    public function getPrevisionType(): string {
        return $this->getEnum(PrevisionType::class, $this->previsionType, '');
    }
}
