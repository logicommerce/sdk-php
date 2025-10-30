<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Enums\SitemapIntervalMultiplier;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\StockType;

/**
 * This is the sitemap settings class.
 * The sitemap settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see SitemapSettings::getActive()
 * @see SitemapSettings::getSplitTypes()
 * @see SitemapSettings::getSplitLanguages()
 * @see SitemapSettings::getCompression()
 * @see SitemapSettings::getUpdateInterval()
 * @see SitemapSettings::getUpdateIntervalMultiplier()
 * @see SitemapSettings::getIncludeCategories()
 * @see SitemapSettings::getIncludeProducts()
 * @see SitemapSettings::getStockType()
 * @see SitemapSettings::getIncludePages()
 * @see SitemapSettings::getIncludeNews()
 * @see SitemapSettings::getIncludeBlog()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class SitemapSettings extends Element {
    use ElementTrait, EnumResolverTrait;

    protected bool $active = false;

    protected bool $splitTypes = false;

    protected bool $splitLanguages = false;

    protected bool $compression = false;

    protected int $updateInterval = 0;

    protected string $updateIntervalMultiplier = '';

    protected bool $includeCategories = false;

    protected bool $includeProducts = false;

    protected string $stockType  = '';

    protected bool $includePages = false;

    protected bool $includeNews = false;

    protected bool $includeBlog = false;

    protected bool $includeBrand = false;

    /**
     * Returns if the sitemap is active or not.
     *
     * @return bool
     */
    public function getActive(): bool {
        return $this->active;
    }

    /**
     * Returns if the sitemap is splitted by types or not.
     *
     * @return bool
     */
    public function getSplitTypes(): bool {
        return $this->splitTypes;
    }

    /**
     * Returns if the sitemap is splitted by languages or not.
     *
     * @return bool
     */
    public function getSplitLanguages(): bool {
        return $this->splitLanguages;
    }

    /**
     * Returns if the sitemap is compressed or not.
     *
     * @return bool
     */
    public function getCompression(): bool {
        return $this->compression;
    }

    /**
     * Returns the sitemap update interval.
     *
     * @return int
     */
    public function getUpdateInterval(): int {
        return $this->updateInterval;
    }

    /**
     * Returns the sitemap interval multiplier.
     *
     * @return string
     */
    public function getUpdateIntervalMultiplier(): string { // ENUM
        return $this->getEnum(SitemapIntervalMultiplier::class, $this->updateIntervalMultiplier, SitemapIntervalMultiplier::HOURS);
    }

    /**
     * Returns if the sitemap will include subcategories or not.
     *
     * @return bool
     */
    public function getIncludeCategories(): bool {
        return $this->includeCategories;
    }

    /**
     * Returns if the sitemap will include products or not.
     *
     * @return bool
     */
    public function getIncludeProducts(): bool {
        return $this->includeProducts;
    }

    /**
     * Returns the sitemap stock type.
     *
     * @return string
     */
    public function getStockType(): string {
        return $this->getEnum(StockType::class, $this->stockType, StockType::NONE);
    }

    /**
     * Returns if the sitemap will include pages or not.
     *
     * @return bool
     */
    public function getIncludePages(): bool {
        return $this->includePages;
    }

    /**
     * Returns if the sitemap will include news or not.
     *
     * @return bool
     */
    public function getIncludeNews(): bool {
        return $this->includeNews;
    }

    /**
     * Returns if the sitemap will include the blog or not.
     *
     * @return bool
     */
    public function getIncludeBlog(): bool {
        return $this->includeBlog;
    }

    /**
     * Returns if the sitemap will include the brnd or not.
     *
     * @return bool
     */
    public function getIncludeBrand(): bool {
        return $this->includeBrand;
    }
}
