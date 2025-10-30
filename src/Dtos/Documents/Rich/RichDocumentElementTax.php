<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\TaxType;

/**
 * This is the rich document element tax class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentElementTax::getBase()
 * @see RichDocumentElementTax::getTaxValue()
 * @see RichDocumentElementTax::getApplyTax()
 * @see RichDocumentElementTax::getApplyRE()
 * @see RichDocumentElementTax::getTax()
 * 
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
abstract class RichDocumentElementTax extends Element{
    use ElementTrait, EnumResolverTrait;

    protected string $base = '';

    protected string $taxValue = '';

    protected bool $applyTax = false;

    protected bool $applyRE = false;

	protected string $type = '';

    /**
     * Returns the rich document element tax base.
     *
     * @return string
     */
    public function getBase(): string {
        return $this->base;
    }

    /**
     * Returns the rich document element tax taxValue.
     *
     * @return string
     */
    public function getTaxValue(): string {
        return $this->taxValue;
    }

    /**
     * Returns the rich document element tax applyTax.
     *
     * @return bool
     */
    public function getApplyTax(): bool {
        return $this->applyTax;
    }

    /**
     * Returns the rich document element tax applyRE.
     *
     * @return bool
     */
    public function getApplyRE(): bool {
        return $this->applyRE;
    }

    /**
     * Returns the document tax type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(TaxType::class, $this->type, TaxType::LOGICOMMERCE);
    }

}
