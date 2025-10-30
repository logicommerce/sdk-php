<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Dtos\Catalog\Product\ProductCodes;

/**
 * This is the document row class.
 * The document rows will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentRow::getItemId()
 * @see DocumentRow::getQuantity()
 * @see DocumentRow::getHash()
 * @see DocumentRow::getImage()
 * @see DocumentRow::getCodes()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos\Documents\Rows
 */
abstract class DocumentRow extends Element {
    use ElementNameTrait, IdentifiableElementTrait;

    protected int $itemId = 0;

    protected int $quantity = 0;

    protected string $hash = '';

    protected string $image = '';

    protected ?ProductCodes $codes = null;

    /**
     * Returns internal identifier of the product included in the document detail line.
     *
     * @return int
     */
    public function getItemId(): int {
        return $this->itemId;
    }

    /**
     * Returns number of units of the item.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * Returns hash code of the detail line.
     *
     * @return string
     */
    public function getHash(): string {
        return $this->hash;
    }

    /**
     * Returns path to the image of the product included in the detail line.
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * Returns product codes.
     *
     * @return ProductCodes|NULL
     */
    public function getCodes(): ?ProductCodes {
        return $this->codes;
    }

    protected function setCodes(array $codes): void {
        $this->codes = new ProductCodes($codes);
    }
}
