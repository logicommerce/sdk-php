<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\OptionType;

/**
 * This is the rich document item option class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentItemOption::getValues();
 * @see RichDocumentItemOption::getSku();
 * @see RichDocumentItemOption::getName();
 * @see RichDocumentItemOption::getPrompt();
 * @see RichDocumentItemOption::getValue();
 * @see RichDocumentItemOption::getPrice();
 * @see RichDocumentItemOption::getPriceWithTaxes();
 * @see RichDocumentItemOption::getWeight();
 * @see RichDocumentItemOption::getUniquePricese();
 * @see RichDocumentItemOption::getValueType();
 * @see RichDocumentItemOption::getPreviousPrice();
 * @see RichDocumentItemOption::getPreviousPriceWithTaxes();
 * @see RichDocumentItemOption::getOptionPId();
 * @see RichDocumentItemOption::getCombinable();
 * 
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentItemOption extends Element{
    use ElementTrait, EnumResolverTrait;

    protected array $values = [];
    
    protected string $sku = '';

    protected string $name = '';

    protected string $prompt = '';

    protected string $value = '';

    protected string $price = '';

    protected string $priceWithTaxes = '';

    protected float $weight = 0.0;

    protected bool $uniquePrice = false;

    protected string $valueType = '';

    protected string $previousPrice = '';

    protected string $previousPriceWithTaxes = '';

    protected string $optionPId = '';

    protected bool $combinable = false;
    
    /**
     * Returns the rich document item option values.
     *
     * @return RichDocumentItemOptionValue[]
     */
    public function getValues(): array {
        return $this->values;
    }

    protected function setValues(array $values): void {
        $this->values = $this->setArrayField($values, RichDocumentItemOptionValue::class);
    }

    /**
     * Returns the rich document item option sku.
     *
     * @return string
     */
    public function getSku(): string {
        return $this->sku;
    }

    /**
     * Returns the rich document item option name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the rich document item option prompt.
     *
     * @return string
     */
    public function getPrompt(): string {
        return $this->prompt;
    }

    /**
     * Returns the rich document item option value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the rich document item option price.
     *
     * @return string
     */
    public function getPrice(): string {
        return $this->price;
    }

    /**
     * Returns the rich document item option priceWithTaxes.
     *
     * @return string
     */
    public function getPriceWithTaxes(): string {
        return $this->priceWithTaxes;
    }

    /**
     * Returns the rich document item option weight.
     *
     * @return float
     */
    public function getWeight(): float {
        return $this->weight;
    }

    /**
     * Returns the rich document item option uniquePrice.
     *
     * @return bool
     */
    public function getUniquePrice(): bool {
        return $this->uniquePrice;
    }

    /**
     * Returns the rich document item option valueType.
     *
     * @return string
     */
    public function getValueType(): string {
        return $this->getEnum(OptionType::class, $this->valueType, OptionType::SHORT_TEXT);
    }

    /**
     * Returns the rich document item option previousPrice.
     *
     * @return string
     */
    public function getPreviousPrice(): string {
        return $this->previousPrice;
    }

    /**
     * Returns the rich document item option previousPriceWithTaxes.
     *
     * @return string
     */
    public function getPreviousPriceWithTaxes(): string {
        return $this->previousPriceWithTaxes;
    }

    /**
     * Returns the rich document item option optionPId.
     *
     * @return string
     */
    public function getOptionPId(): string {
        return $this->optionPId;
    }

    /**
     * Returns the rich document item option combinable.
     *
     * @return bool
     */
    public function getCombinable(): bool {
        return $this->combinable;
    }

}
