<?php

namespace SDK\Dtos\Documents\Transactions;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\TaxTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\TaxType;

/**
 * This is the document tax definition class.
 * The document tax definitions will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentTaxDefinition::getModality()
 * @see DocumentTaxDefinition::getTaxRate()
 * @see DocumentTaxDefinition::getTaxPrice()
 * @see DocumentTaxDefinition::getTotalPrice()
 * @see DocumentTaxDefinition::getBaseWithoutDiscounts()
 * @see DocumentTaxDefinition::getDiscounts()
 *
 * @see Element
 * @see IdentifiableElementTrait
 * @see ElementNameTrait
 * @see TaxTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Transactions
 */
abstract class DocumentTaxDefinition extends Element {
    use IdentifiableElementTrait, ElementNameTrait, TaxTrait, EnumResolverTrait;

    protected string $modality = '';

    protected float $taxRate = 0;

    protected float $taxPrice = 0;

    protected float $totalPrice = 0;

    protected float $baseWithoutDiscounts = 0;

    protected float $discount = 0;

    protected string $type = '';

    /**
     * Returns method of application of the tax.
     *
     * @return string
     */
    public function getModality(): string {
        return $this->modality;
    }

    /**
     * Returns the tax rate.
     *
     * @return float
     */
    public function getTaxRate(): float {
        return $this->taxRate;
    }

    /**
     * Returns amount due to the application of the tax rate of the tax.
     *
     * @return float
     */
    public function getTaxPrice(): float {
        return $this->taxPrice;
    }

    /**
     * Returns total amount due due to taxes
     *
     * @return float
     */
    public function getTotalPrice(): float {
        return $this->totalPrice;
    }

    /**
     * Returns base amount without taking discounts into account.
     *
     * @return float
     */
    public function getBaseWithoutDiscounts(): float {
        return $this->baseWithoutDiscounts;
    }

    /**
     * Returns amount due to discount.
     *
     * @return float
     */
    public function getDiscount(): float {
        return $this->discount;
    }

    /**
     * Returns the type of the tax.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(TaxType::class, $this->type, TaxType::LOGICOMMERCE);
    }
}
