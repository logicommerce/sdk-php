<?php

namespace SDK\Dtos\Catalog\Product\Options;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the Options Language class.
 * The language information of API options will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see OptionLanguage::getPrompt()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Catalog\Product\Options
 */
class OptionLanguage {
    use ElementTrait, ElementNameTrait;

    protected string $prompt = '';

    protected string $filterName = '';

    /**
     * Returns the option prompt on the website current language.
     *
     * @return string
     */
    public function getPrompt(): string {
        return $this->prompt;
    }

    /**
     * Returns the option filterName on the website current language.
     *
     * @return string
     */
    public function getFilterName(): string {
        return $this->filterName;
    }
}
