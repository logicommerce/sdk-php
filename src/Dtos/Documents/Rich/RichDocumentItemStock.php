<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\PrevisionType;

/**
 * This is the rich document item stock class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentItemStock::getWarehouseName()
 * @see RichDocumentItemStock::getWarehouseGroupName()
 * @see RichDocumentItemStock::getQuantity()
 * @see RichDocumentItemStock::getIncomingDate()
 * @see RichDocumentItemStock::getOffsetDays()
 * @see RichDocumentItemStock::getPriority()
 * @see RichDocumentItemStock::getHash()
 * @see RichDocumentItemStock::getPrevisionType()
 * @see DocumentRowStock::getMissingStockQuantity()
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentItemStock extends Element{
    use ElementTrait, EnumResolverTrait;

    protected string $warehouseName = '';

    protected string $warehouseGroupName = '';

    protected int $quantity = 0;

    protected string $incomingDate = '';

    protected int $offsetDays = 0;

    protected int $priority = 0;

    protected string $hash = '';

    protected string $previsionType = '';

    protected int $missingStockQuantity = 0;

    /**
     * Returns the rich document item stock warehouseName.
     *
     * @return string
     */
    public function getWarehouseName(): string {
        return $this->warehouseName;
    }

    /**
     * Returns the rich document item stock warehouseGroupName.
     *
     * @return string
     */
    public function getWarehouseGroupName(): string {
        return $this->warehouseGroupName;
    }

    /**
     * Returns the rich document item stock quantity.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * Returns the rich document item stock incomingDate.
     *
     * @return string
     */
    public function getIncomingDate(): string {
        return $this->incomingDate;
    }

    /**
     * Returns the rich document item stock offsetDays.
     *
     * @return int
     */
    public function getOffsetDays(): int {
        return $this->offsetDays;
    }

    /**
     * Returns the rich document item stock priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the rich document item stock hash.
     *
     * @return string
     */
    public function getHash(): string {
        return $this->hash;
    }

    /**
     * Returns the rich document item stock previsionType.
     *
     * @return string
     */
    public function getPrevisionType(): string {
        return $this->getEnum(PrevisionType::class, $this->previsionType, PrevisionType::RESERVE);
    }

    /**
     * Returns the document row stock missingStockQuantity.
     *
     * @return int
     */
    public function getMissingStockQuantity(): int {
        return $this->missingStockQuantity;
    }
}
