<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\CustomTagValue;
use SDK\Core\Dtos\Traits\CustomTagsDataTrait;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Custom Tag Value class.
 * The custom tags values information of API elements will be stored in that class and will remain immutable
 * (only get methods are available)
 *
 * @see CustomTagValue::getCustomTagId()
 * @see CustomTagValue::getValue()
 *
 * @see ElementTrait
 * @see CustomTagsBaseDataTrait
 *
 * @package SDK\Dtos\Basket
 */
class BasketCustomTagValue extends CustomTagValue {
    use ElementTrait, CustomTagsDataTrait;

    protected bool $inOrders = false;

    protected string $valuePId = '';

    /**
     * Returns if the custom tag is printable on the orders documents.
     *
     * @return bool
     */
    public function getInOrders(): bool {
        return $this->inOrders;
    }

    /**
     * Returns the public identifier of the custom tag value.
     *
     * @return string
     */
    public function getValuePId(): string {
        return $this->valuePId;
    }
}
