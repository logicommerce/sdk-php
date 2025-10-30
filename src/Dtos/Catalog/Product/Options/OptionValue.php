<?php

namespace SDK\Dtos\Catalog\Product\Options;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Dtos\Catalog\Media;
use SDK\Dtos\Catalog\Product\ItemPrices;

/**
 * This is the Option Value class.
 * The options values information of API products will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see OptionValue::getImages()
 * @see OptionValue::getLanguage()
 * @see OptionValue::getPrices()
 * @see OptionValue::getPricesWithTaxes()
 * @see OptionValue::getPriority()
 * @see OptionValue::getWeight()
 * @see OptionValue::getNoReturn()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\Catalog\Product\Options
 */
class OptionValue {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected int $priority = 0;

    protected float $weight = 0.0;

    protected ?OptionValueLanguage $language = null;

    protected bool $noReturn = false;

    protected ?ItemPrices $prices = null;

    protected ?ItemPrices $pricesWithTaxes = null;

    protected ?Media $images = null;

    /**
     * Returns the option value priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the option value weight.
     *
     * @return float
     */
    public function getWeight(): float {
        return $this->weight;
    }

    /**
     * Returns the option value language object.
     *
     * @see OptionValueLanguage
     * @return OptionValueLanguage|NULL
     */
    public function getLanguage(): ?OptionValueLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new OptionValueLanguage($language);
    }

    /**
     * Returns the product option value prices.
     *
     * @see ItemPrices
     * @return ItemPrices|NULL
     */
    public function getPrices(): ?ItemPrices {
        return $this->prices;
    }

    protected function setPrices(array $prices): void {
        $this->prices = new ItemPrices($prices);
    }

    /**
     * Returns the product option value prices (taxes included).
     *
     * @see ItemPrices
     * @return ItemPrices|NULL
     */
    public function getPricesWithTaxes(): ?ItemPrices {
        return $this->pricesWithTaxes;
    }

    protected function setPricesWithTaxes(array $pricesWithTaxes): void {
        $this->pricesWithTaxes = new ItemPrices($pricesWithTaxes);
    }

    /**
     * Returns the product prices in function of the given setting.
     *
     * @see ItemPrices
     * @return ItemPrices[]
     */
    public function getShowPrices(bool $showTaxincluded): array {
        if ($showTaxincluded === true) {
            return ['prices' => $this->pricesWithTaxes, 'alternativePrices' => $this->prices];
        }
        else {
            return ['prices' => $this->prices, 'alternativePrices' => $this->pricesWithTaxes];
        }
    }

    /**
     * Sets if the option value has to be refundable/returnable or not.
     *
     * @return bool
     */
    public function getNoReturn(): bool {
        return $this->noReturn;
    }

    /**
     * Returns the product option value images.
     *
     * @see Media
     * @return Media|NULL
     */
    public function getImages(): ?Media {
        return $this->images;
    }

    protected function setImages(array $images): void {
        $this->images = new Media($images);
    }
}
