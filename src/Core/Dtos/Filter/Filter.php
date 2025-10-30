<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Filter;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Filter class.
 * The availables filter of the current navigation items will be stored in that class and
 * will remain immutable (only get methods are available)
 *
 * @see Filter::getOptions()
 * @see Filter::getCustomTags()
 * @see Filter::getCustomTagGroups()
 * @see Filter::getPrices()
 * @see Filter::getBrands()
 * @see Filter::getCategories()
 *
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos\Filter
 */
class Filter extends Element {
    use ElementTrait;

    private array $options = [];

    private array $customTags = [];

    private array $customTagGroups = [];

    private ?FilterPrices $prices = null;

    private array $brands = [];

    private array $categories = [];

    /**
     * Returns an array of FilterOption.
     *
     * @return FilterOption[]
     */
    public function getOptions(): array {
        return $this->options;
    }

    private function setOptions(array $options): void {
        $this->options = $this->setArrayField($options, FilterOption::class);
    }

    /**
     * Returns an array of FilterCustomTag.
     *
     * @return FilterCustomTag[]
     */
    public function getCustomTags(): array {
        return $this->customTags;
    }

    private function setCustomTags(array $customTags): void {
        $this->customTags = $this->setArrayField($customTags, FilterCustomTag::class);
    }

    /**
     * Returns an array of FilterCustomTagGroups.
     *
     * @return FilterCustomTagGroups[]
     */
    public function getCustomTagGroups(): array {
        return $this->customTagGroups;
    }

    private function setCustomTagGroups(array $customTagGroups): void {
        $this->customTagGroups = $this->setArrayField($customTagGroups, FilterCustomTagGroups::class);
    }

    /**
     * Returns the prices available to filter items (minimum and maximum).
     *
     * @return FilterPrices|NULL
     */
    public function getPrices(): ?FilterPrices {
        return $this->prices;
    }

    private function setPrices($prices): void {
        $this->prices = new FilterPrices($prices);
    }

    /**
     * Returns an array of FilterCategory for brands.
     *
     * @return FilterBasic[]
     */
    public function getBrands(): array {
        return $this->brands;
    }

    private function setBrands(array $brands): void {
        $this->brands = $this->setArrayField($brands, FilterBasic::class);
    }

    /**
     * Returns an array of FilterCategory for categories.
     *
     * @return FilterCategory[]
     */
    public function getCategories(): array {
        return $this->categories;
    }

    private function setCategories(array $categories): void {
        $this->categories = $this->setArrayField($categories, FilterCategory::class);
    }
}
