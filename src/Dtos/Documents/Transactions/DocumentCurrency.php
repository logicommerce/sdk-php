<?php

namespace SDK\Dtos\Documents\Transactions;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DocumentCurrencyMode;

/**
 * This is the document currency class.
 * The document currency will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentCurrency::getMode()
 * @see DocumentCurrency::getCode()
 * @see DocumentCurrency::getCodeNumber()
 * @see DocumentCurrency::getSymbol()
 * @see DocumentCurrency::getUsdValue()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see ElementNameTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Transactions
 */
class DocumentCurrency extends Element {
    use ElementTrait, IdentifiableElementTrait, ElementNameTrait, EnumResolverTrait;

    protected string $mode = '';

    protected string $code = '';

    protected string $codeNumber = '';

    protected string $symbol = '';

    protected float $usdValue = 0.0;

    /**
     * Returns currency mode indicator: <em>INVOICING</em> indicates that the amounts are expressed in the invoicing currency, <em>PURCHASE</em> indicates that the amounts are expressed in the currency in which the order was placed .
     *
     * @return string
     */
    public function getMode(): string {
        return $this->getEnum(DocumentCurrencyMode::class, $this->mode, '');
    }

    /**
     * Returns currency code in ISO 4217 format.
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * Returns international standard ISO 4217 currency code.
     *
     * @return string
     */
    public function getCodeNumber(): string {
        return $this->codeNumber;
    }

    /**
     * Returns symbol configured for the currency.
     *
     * @return string
     */
    public function getSymbol(): string {
        return $this->symbol;
    }

    /**
     * Returns value of the currency exchange to USD at the time of placing the order.
     *
     * @return float
     */
    public function getUsdValue(): float {
        return $this->usdValue;
    }
}
