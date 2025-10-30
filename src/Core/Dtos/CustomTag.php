<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\CustomTagsDataTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the Custom Tag class.
 * The custom tags information of API elements will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CustomTag::getPriority()
 * @see CustomTag::getLanguage()
 * @see CustomTag::getFilterable()
 * @see CustomTag::getSearchable()
 * @see CustomTag::getComparable()
 * @see CustomTag::getRequired()
 * @see CustomTag::getSelectableValues()
 * @see CustomTag::getNameOnFeed()
 * @see CustomTag::getMinValue()
 * @see CustomTag::getMaxValue()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see CustomTagsDataTrait
 *
 * @package SDK\Core\Dtos
 */
class CustomTag extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, CustomTagsDataTrait;

    protected int $priority = 0;

    protected int $position = 0;

    protected ?CustomTagLanguage $language = null;

    protected bool $filterable = false;

    protected bool $searchable = false;

    protected bool $comparable = false;

    protected bool $required = false;

    protected string $nameOnFeed = '';

    protected array $selectableValues = [];

    protected string $minValue = '';

    protected string $maxValue = '';

    protected string $defaultValue = '';

    /**
     * Returns the custom tag priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the custom tag position.
     *
     * @return int
     */
    public function getPosition(): int {
        return $this->position;
    }

    /**
     * Returns the custom tag language object.
     *
     * @see CustomTagLanguage
     * @return CustomTagLanguage|NULL
     */
    public function getLanguage(): ?CustomTagLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new CustomTagLanguage($language);
    }

    /**
     * Returns if the custom tag has to be filterable or not.
     *
     * @return bool
     */
    public function getFilterable(): bool {
        return $this->filterable;
    }

    /**
     * Returns if the custom tag has to be searchable or not.
     *
     * @return bool
     */
    public function getSearchable(): bool {
        return $this->searchable;
    }

    /**
     * Returns if the custom tag has to be comparable or not.
     *
     * @return bool
     */
    public function getComparable(): bool {
        return $this->comparable;
    }

    /**
     * Returns if the custom tag has to be required or not.
     *
     * @return bool
     */
    public function getRequired(): bool {
        return $this->required;
    }

    /**
     * Returns if the custom tag name on feed.
     *
     * @return string
     */
    public function getNameOnFeed(): string {
        return $this->nameOnFeed;
    }

    /**
     * Returns the custom tag selectable values.
     *
     * @return CustomTagSelectableValue[]
     */
    public function getSelectableValues(): array {
        return $this->selectableValues;
    }

    protected function setSelectableValues(array $selectableValues): void {
        $this->selectableValues = $this->setArrayField($selectableValues, CustomTagSelectableValue::class);
    }

    /**
     * Returns the custom tag minimum allowed value.
     *
     * @return string
     */
    public function getMinValue(): string {
        return $this->minValue;
    }

    /**
     * Returns the custom tag maximum allowed value.
     *
     * @return string
     */
    public function getMaxValue(): string {
        return $this->maxValue;
    }

    /**
     * Returns the custom tag default value.
     *
     * @return string
     */
    public function getDefaultValue(): string {
        return $this->defaultValue;
    }
}
