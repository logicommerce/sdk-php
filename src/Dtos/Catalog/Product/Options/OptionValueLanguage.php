<?php

namespace SDK\Dtos\Catalog\Product\Options;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Options Value Language class.
 * The language information of API options values will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see OptionValueLanguage::getValue()
 * @see OptionValueLanguage::getShortDescription()
 * @see OptionValueLanguage::getLongDescription()
 * @see OptionValueLanguage::getSearchValue()
 *
 * @see Element
 *
 * @package SDK\Dtos\Catalog\Product\Options
 */
class OptionValueLanguage {
    use ElementTrait;

    protected string $value = '';

    protected string $shortDescription = '';

    protected string $longDescription = '';

    protected string $searchValue = '';

    /**
     * Returns the value of the option value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the option value short description.
     *
     * @return string
     */
    public function getShortDescription(): string {
        return $this->shortDescription;
    }

    /**
     * Returns the option value long description.
     *
     * @return string
     */
    public function getLongDescription(): string {
        return $this->longDescription;
    }

    /**
     * Returns the option value search value.
     *
     * @return string
     */
    public function getSearchValue(): string {
        return $this->searchValue;
    }
}
