<?php

namespace SDK\Dtos\Kimera;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
/**
 * This is the KimeraDataRequest respnonse class.
 *
 * @see KimeraDataRequest::getLanguageId()
 * @see KimeraDataRequest::getVersion()
 * @see KimeraDataRequest::getDefinitions()
 * @see KimeraDataRequest::getTaxes()
 * @see KimeraDataRequest::getCurrencyCode()
 * @see KimeraDataRequest::getCurrencyIds()
 * @see KimeraDataRequest::getCurrencyMultiplier()
 * @see KimeraDataRequest::getFareMultiplier()
 * @see KimeraDataRequest::isShowTaxesIncluded()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos
 */
class KimeraDataRequest extends Element {
    use ElementTrait;

    protected int $languageId = 0;

    protected string $version = '';

    protected array $definitions = [];

    protected array $taxes = [];

    protected string $currencyCode = '';

    protected array $currencyIds = [];

    protected float $currencyMultiplier = 0;

    protected float $fareMultiplier = 0;

    protected bool $showTaxesIncluded = false;

    /**
     * Returns the language id.
     *
     * @return string
     */
    public function getLanguageId(): int {
        return $this->languageId;
    }

    /**
     * Returns the version.
     * 
     * @return string
     */
    public function getVersion(): string {
        return $this->version;
    }

    /**
     * Returns the definitions.
     *
     * @return array
     */
    public function getDefinitions(): array {
        return $this->definitions;
    }

    /**
     * Returns the taxes.
     *
	 * @return KimeraTaxes[]
     */
    public function getTaxes(): array {
        return $this->taxes;
    }

    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, KimeraTaxes::class);
    }

    /**
     * Returns the currency code.
     *
     * @return string
     */
    public function getCurrencyCode(): string {
        return $this->currencyCode;
    }

    /**
     * Returns the currency ids.
     *
     * @return array
     */
    public function getCurrencyIds(): array {
        return $this->currencyIds;
    }

    /**
     * Returns the currency multiplier.
     *
     * @return float
     */
    public function getCurrencyMultiplier(): float {
        return $this->currencyMultiplier;
    }

    /**
     * Returns the fare multiplier.
     *
     * @return float
     */
    public function getFareMultiplier(): float {
        return $this->fareMultiplier;
    }

    /**
     * Returns the show taxes included.
     *
     * @return bool
     */
    public function isShowTaxesIncluded(): bool {
        return $this->showTaxesIncluded;
    }
}