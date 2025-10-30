<?php

namespace SDK\Dtos\Catalog\Product\Options;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\OptionType;
use SDK\Enums\OptionTypology;

/**
 * This is the Option class.
 * The options information of API products will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Option::getImage()
 * @see Option::getLanguage()
 * @see Option::getMaxValues()
 * @see Option::getMinValues()
 * @see Option::getPriority()
 * @see Option::getTypology()
 * @see Option::getValues()
 * @see Option::getCombinable()
 * @see Option::getFilterable()
 * @see Option::getRequired()
 * @see Option::getShowAsGrid()
 * @see Option::getUniquePrice()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\Catalog\Product\Options
 */
class Option {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, EnumResolverTrait;

    protected bool $showAsGrid = false;

    protected int $priority = 0;

    protected bool $combinable = false;

    protected bool $uniquePrice = false;

    protected bool $filterable = false;

    protected bool $required = false;

    protected string $typology = '';

    protected string $image = '';

    protected ?OptionLanguage $language = null;

    protected array $values = [];

    protected string $type = '';

    protected int $minValues = 0;

    protected int $maxValues = 0;


    /**
     * Sets if the option has to be displayed on a grid or not.
     *
     * @return bool
     */
    public function getShowAsGrid(): bool {
        return $this->showAsGrid;
    }

    /**
     * Returns the option priority..
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Sets if the option is combinable or not.
     *
     * @return bool
     */
    public function getCombinable(): bool {
        return $this->combinable;
    }

    /**
     * Sets if the option price increment must be added to the base product price
     * only for the first unit added to the cart or for every one of them.
     *
     * @return bool
     */
    public function getUniquePrice(): bool {
        return $this->uniquePrice;
    }

    /**
     * Sets if the option is filterable or not.
     *
     * @return bool
     */
    public function getFilterable(): bool {
        return $this->filterable;
    }

    /**
     * Sets if the option is required or not.
     *
     * @return bool
     */
    public function getRequired(): bool {
        return $this->required;
    }

    /**
     * Returns the option typology.
     * This value is normally used for google shopping feeds or other 3rd party outputs that need it.
     *
     * @return string
     */
    public function getTypology(): string { // ENUM
        return $this->getEnum(OptionTypology::class, $this->typology, OptionTypology::WITHOUT_TYPOLOGY);
    }

    /**
     * Returns the option image.
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * Returns the option language object.
     *
     * @see OptionLanguage
     * @return OptionLanguage|NULL
     */
    public function getLanguage(): ?OptionLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new OptionLanguage($language);
    }

    /**
     * Returns the collection of values for this option.
     *
     * @see OptionValue
     * @return OptionValue[]
     */
    public function getValues(): array {
        return $this->values;
    }

    protected function setValues(array $values): void {
        $this->values = $this->setArrayField($values, OptionValue::class);
    }

    /**
     * Returns the option type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(OptionType::class, $this->type, OptionType::SHORT_TEXT);
    }

    /**
     * Returns the minimum value of this option.
     *
     * @return int
     */
    public function getMinValues(): int {
        return $this->minValues;
    }

    /**
     * Returns the maximum value of this option.
     *
     * @return int
     */
    public function getMaxValues(): int {
        return $this->maxValues;
    }
}
