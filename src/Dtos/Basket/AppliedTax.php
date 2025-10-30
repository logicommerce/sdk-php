<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\AppliedTaxTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\TaxType;

/**
 * Applied tax container class.
 * 
 * The applied taxes information will be stored in that class and will remain 
 * immutable (only get methods are available).
 *
 * @see AppliedTax::getType()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
abstract class AppliedTax extends Element {
    use ElementTrait, AppliedTaxTrait, EnumResolverTrait;

    protected bool $applyRE = false;

    protected string $type = '';

    /**
     * Returns the applied tax type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(TaxType::class, $this->type, TaxType::LOGICOMMERCE);
    }

    /**
     * Returns if the applied tax has to apply the RE.
     *
     * @return bool
     */
    public function getApplyRE(): bool {
        return $this->applyRE;
    }

}
