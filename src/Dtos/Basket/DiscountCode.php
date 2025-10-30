<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the DiscountCode class.
 * The DiscountCodes information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DiscountCode::getDiscountId()
 * @see DiscountCode::getCode()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class DiscountCode extends Element {
    use ElementTrait;

    protected int $discountId = 0;

    protected string $code = '';

    /**
     * Returns the DiscountCode discountId.
     *
     * @return int
     */
    public function getDiscountId(): int {
        return $this->discountId;
    }

    /**
     * Returns the DiscountCode code.
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

}
