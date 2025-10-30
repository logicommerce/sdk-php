<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DocumentCurrencyMode;

/**
 * This is the rich document currency class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentCurrency::getId()
 * @see RichDocumentCurrency::getMode()
 * @see RichDocumentCurrency::getName()
 * @see RichDocumentCurrency::getCode()
 * @see RichDocumentCurrency::getCodeNumber()
 * @see RichDocumentCurrency::getSymbol()
 * @see RichDocumentCurrency::getUsdValue()
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentCurrency extends Element{
    use ElementTrait, EnumResolverTrait;

    protected string $mode = '';
    
    protected string $name = '';
    
    protected string $code = '';
    
    protected string $codeNumber = '';
    
    protected string $symbol = '';
    
    protected float $usdValue = 0.0;

    /**
     * Returns the rich document currency mode.
     *
     * @return string
     */
    public function getMode(): string {
        return $this->getEnum(DocumentCurrencyMode::class, $this->mode, DocumentCurrencyMode::INVOICING);
    }

    /**
     * Returns the rich document currency name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the rich document currency code.
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * Returns the rich document currency codeNumber.
     *
     * @return string
     */
    public function getCodeNumber(): string {
        return $this->codeNumber;
    }

    /**
     * Returns the rich document currency symbol.
     *
     * @return string
     */
    public function getSymbol(): string {
        return $this->symbol;
    }

    /**
     * Returns the rich document currency usdValue.
     *
     * @return float
     */
    public function getUsdValue(): float {
        return $this->usdValue;
    }

}
