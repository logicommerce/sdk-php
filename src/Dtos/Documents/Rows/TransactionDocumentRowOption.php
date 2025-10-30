<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\OptionType;

/**
 * This is the transaction document row option class.
 * The transaction document row options will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see TransactionDocumentRowOption::getUniquePrice()
 * @see TransactionDocumentRowOption::getCombinable()
 * @see TransactionDocumentRowOption::getValueType()
 * @see TransactionDocumentRowOption::getValues()
 * @see TransactionDocumentRowOption::getPrice()
 * @see TransactionDocumentRowOption::getWeight()
 * @see TransactionDocumentRowOption::getPreviousPrice()
 *
 * @see DocumentRowOption
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rows
 */
class TransactionDocumentRowOption extends DocumentRowOption {
    use ElementTrait, EnumResolverTrait;

    protected bool $uniquePrice = false;

    protected bool $combinable = false;

    protected string $valueType = '';

    protected array $values = [];

    protected float $price = 0;

    protected float $weight = 0;

    protected float $previousPrice = 0;

    /**
     * Returns whether the option price is applied only once, regardless of the number of units purchased of the product.
     *
     * @return bool
     */
    public function getUniquePrice(): bool {
        return $this->uniquePrice;
    }

    /**
     * Returns whether the values of this option are used to generate combinations of options.
     *
     * @return bool
     */
    public function getCombinable(): bool {
        return $this->combinable;
    }

    /**
     * Returns the type of option.
     *
     * @return string
     */
    public function getValueType(): string {
        return $this->getEnum(OptionType::class, $this->valueType, '');
    }

    /**
     * Returns information about the option values.
     *
     * @return TransactionDocumentRowOptionValue[]
     */
    public function getValues(): array {
        return $this->values;
    }

    protected function setValues(array $values): void {
        $this->values = $this->setArrayField($values, TransactionDocumentRowOptionValue::class);
    }

    /**
     * Returns total increase in the price due to the different option values.
     *
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * Returns total increase in weight due to the different option values.
     *
     * @return float
     */
    public function getWeight(): float {
        return $this->weight;
    }

    /**
     * Returns total increase in the base price of the product due to the different option values in the event it has an offer price.
     *
     * @return float
     */
    public function getPreviousPrice(): float {
        return $this->previousPrice;
    }
}
