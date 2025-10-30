<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Country Language Link class.
 * The countries will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CountryLanguageLink::getUrl()
 * @see CountryLanguageLink::getNeedCallSetCountry()
 * @see CountryLanguageLink::getName()
 * @see CountryLanguageLink::getCode()
 *
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class CountryLanguageLink extends Element {
    use ElementTrait;

    protected string $url = '';

    protected bool $needCallSetCountry = false;

    protected string $name = '';

    protected string $code = '';

    /**
     * Link containing the URL of the corresponding store version for the respective country-language.
     *
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }

    protected function setUrl(string $url): void {
        $this->url = $url;
    }

    /**
     * Informs whether calling setCountry is necessary for country change.
     *
     * @return bool
     */
    public function getNeedCallSetCountry(): bool {
        return $this->needCallSetCountry;
    }

    protected function setNeedCallSetCountry(bool $needCallSetCountry): void {
        $this->needCallSetCountry = $needCallSetCountry;
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
