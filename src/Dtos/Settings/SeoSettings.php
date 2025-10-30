<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\XdefaultCriteria;

/**
 * This is the SEO settings class.
 * The SEO settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see SeoSettings::getLanguageInSubdirectory()
 * @see SeoSettings::getProducts()
 * @see SeoSettings::getAreas()
 * @see SeoSettings::getCategories()
 * @see SeoSettings::getBrands()
 * @see SeoSettings::getPages()
 * @see SeoSettings::getNews()
 * @see SeoSettings::getGeneric()
 * @see SeoSettings::getBlogs()
 * @see SeoSettings::getBlogTags()
 * @see SeoSettings::getBlogBloggers()
 * @see SeoSettings::getBlogCategories()
 * @see SeoSettings::getBlogPosts()
 * @see SeoSettings::getDiscounts()
 * @see SeoSettings::getXdefaultCriteria()
 * @see SeoSettings::getForceLanguageInSubdirectory()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class SeoSettings extends Element {
    use ElementTrait, EnumResolverTrait;

    protected bool $languageInSubdirectory = false;

    protected bool $forceLanguageInSubDirectory = false;

    protected ?ItemSeoSettings $products = null;

    protected ?ItemSeoSettings $areas = null;

    protected ?ItemSeoSettings $categories = null;

    protected ?ItemSeoSettings $brands = null;

    protected ?ItemSeoSettings $pages = null;

    protected ?ItemSeoSettings $news = null;

    protected ?ItemSeoSettings $generic = null;

    protected ?ItemSeoSettings $blogs = null;

    protected ?ItemSeoSettings $blogTags = null;

    protected ?ItemSeoSettings $blogBloggers = null;

    protected ?ItemSeoSettings $blogCategories = null;

    protected ?ItemSeoSettings $blogPosts = null;

    protected ?ItemSeoSettings $discounts = null;

    protected string $xdefaultCriteria = '';

    protected bool $forceLanguageInSubdirectory = false;

    /**
     * Specifies whether to add the language in the URL as a subdirectory.
     *
     * @return bool
     */
    public function getLanguageInSubdirectory(): bool {
        return $this->languageInSubdirectory;
    }

    /**
     * Returns the SEO settings for areas.
     *
     * @return ItemSeoSettings|NULL
     */
    public function getAreas(): ?ItemSeoSettings {
        return $this->areas;
    }

    protected function setAreas(array $areas): void {
        $this->areas = new ItemSeoSettings($areas);
    }

    /**
     * Returns the SEO settings for products.
     *
     * @return ItemSeoSettings|NULL
     */
    public function getProducts(): ?ItemSeoSettings {
        return $this->products;
    }

    protected function setProducts(array $products): void {
        $this->products = new ItemSeoSettings($products);
    }

    /**
     * Returns the SEO settings for categories.
     *
     * @return ItemSeoSettings|NULL
     */
    public function getCategories(): ?ItemSeoSettings {
        return $this->categories;
    }

    protected function setCategories(array $categories): void {
        $this->categories = new ItemSeoSettings($categories);
    }

    /**
     * Returns the SEO settings for brands.
     *
     * @return ItemSeoSettings|NULL
     */
    public function getBrands(): ?ItemSeoSettings {
        return $this->brands;
    }

    protected function setBrands(array $brands): void {
        $this->brands = new ItemSeoSettings($brands);
    }

    /**
     * Returns the SEO settings for pages.
     *
     * @return ItemSeoSettings|NULL
     */
    public function getPages(): ?ItemSeoSettings {
        return $this->pages;
    }

    protected function setPages(array $pages): void {
        $this->pages = new ItemSeoSettings($pages);
    }

    /**
     * Returns the SEO settings for news.
     *
     * @return ItemSeoSettings|NULL
     */
    public function getNews(): ?ItemSeoSettings {
        return $this->news;
    }

    protected function setNews(array $news): void {
        $this->news = new ItemSeoSettings($news);
    }

    /**
     * Returns the generic SEO settings.
     *
     * @return ItemSeoSettings|NULL
     */
    public function getGeneric(): ?ItemSeoSettings {
        return $this->generic;
    }

    protected function setGeneric(array $generic): void {
        $this->generic = new ItemSeoSettings($generic);
    }

    /**
     * Returns the SEO settings for blogs.
     *
     * @return ItemSeoSettings|NULL
     */
    public function getblogs(): ?ItemSeoSettings {
        return $this->blogs;
    }

    protected function setblogs(array $blogs): void {
        $this->blogs = new ItemSeoSettings($blogs);
    }

    /**
     * Returns the SEO settings for blogTags.
     *
     * @return ItemSeoSettings|NULL
     */
    public function getBlogTags(): ?ItemSeoSettings {
        return $this->blogTags;
    }

    protected function setBlogTags(array $blogTags): void {
        $this->blogTags = new ItemSeoSettings($blogTags);
    }

    /**
     * Returns the SEO settings for blog bloggers.
     *
     * @return ItemSeoSettings|NULL
     */
    public function getBlogBloggers(): ?ItemSeoSettings {
        return $this->blogBloggers;
    }

    protected function setBlogBloggers(array $blogBloggers): void {
        $this->blogBloggers = new ItemSeoSettings($blogBloggers);
    }

    /**
     * Returns the SEO settings for blog categories.
     *
     * @return ItemSeoSettings|NULL
     */
    public function getBlogCategories(): ?ItemSeoSettings {
        return $this->blogCategories;
    }

    protected function setBlogCategories(array $blogCategories): void {
        $this->blogCategories = new ItemSeoSettings($blogCategories);
    }

    /**
     * Returns the SEO settings for blog posts.
     *
     * @return ItemSeoSettings|NULL
     */
    public function getBlogPosts(): ?ItemSeoSettings {
        return $this->blogPosts;
    }

    protected function setBlogPosts(array $blogPosts): void {
        $this->blogPosts = new ItemSeoSettings($blogPosts);
    }

    /**
     * Returns the SEO settings for discounts.
     *
     * @return ItemSeoSettings|NULL
     */
    public function getDiscounts(): ?ItemSeoSettings {
        return $this->discounts;
    }

    protected function setDiscounts(array $discounts): void {
        $this->discounts = new ItemSeoSettings($discounts);
    }

    /**
     * Specifies whether to force to add the language in the URL as a subdirectory.
     *
     * @return bool
     */
    public function getForceLanguageInSubdirectory(): bool {
        return $this->forceLanguageInSubdirectory;
    }

    /**
     * Returns xdefaultCriteria value.
     *
     * @return string
     */
    public function getXdefaultCriteria(): string {
        return $this->getEnum(XdefaultCriteria::class, $this->xdefaultCriteria, XdefaultCriteria::NONE);
    }
}
