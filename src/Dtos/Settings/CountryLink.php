<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the country link class.
 * The countries will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CountryLink::getLanguages()
 * @see CountryLink::getCurrencies()
 *
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class CountryLink extends Element {
    use ElementTrait;

    protected array $languages = [];

    protected string $name = '';

    protected string $code = '';

    /**
     * Information block with languages for a specific country.
     *
     * @return CountryLanguageLink[]
     */
    public function getLanguages(): array {
        return $this->languages;
    }

    protected function setLanguages(array $languages): void {
        $this->languages = $this->setArrayField($languages, CountryLanguageLink::class);
    }

    /**
     * Language name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    protected function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * International standard alphabetic code ISO 639-1 of the language.
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    protected function setCode(string $code): void {
        $this->code = $code;
    }
}
