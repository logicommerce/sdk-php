<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementModuleTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Blog\BlogPost;
use SDK\Dtos\Catalog\Page\Page;
use SDK\Dtos\Catalog\Product\Product;
use SDK\Enums\RelatedType;

/**
 * This is the Related Items class.
 * The information of API Related Items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RelatedItems::getImage()
 * @see RelatedItems::getBanners()
 * @see RelatedItems::getCategories()
 * @see RelatedItems::getNews()
 * @see RelatedItems::getPages()
 * @see RelatedItems::getProducts()
 * @see RelatedItems::getPosts()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Catalog
 */
class RelatedItems extends Element {
    use ElementTrait, ElementNameTrait, ElementModuleTrait, EnumResolverTrait;

    protected string $image = '';

    protected string $type = '';

    protected int $position = 0;

    protected array $banners = [];

    protected array $categories = [];

    protected array $news = [];

    protected array $pages = [];

    protected array $products = [];

    protected array $posts = [];

    /**
     * Returns the related section image.
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * Returns the related section type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(RelatedType::class, $this->type, RelatedType::RELATED);
    }

    /**
     * Returns the related section position.
     *
     * @return int
     */
    public function getPosition(): int {
        return $this->position;
    }

    /**
     * Returns the banners into the related section.
     *
     * @return Banner[]
     */
    public function getBanners(): array {
        return $this->banners;
    }

    protected function setBanners(array $banners): void {
        $this->banners = $this->setArrayField($banners, Banner::class);
    }

    /**
     * Returns the categories into the related section.
     *
     * @return Category[]
     */
    public function getCategories(): array {
        return $this->categories;
    }

    protected function setCategories(array $categories): void {
        $this->categories = $this->setArrayField($categories, Category::class);
    }

    /**
     * Returns the news into the related section.
     *
     * @return News[]
     */
    public function getNews(): array {
        return $this->news;
    }

    protected function setNews(array $news): void {
        $this->news = $this->setArrayField($news, News::class);
    }

    /**
     * Returns the pages into the related section.
     *
     * @return Page[]
     */
    public function getPages(): array {
        return $this->pages;
    }

    protected function setPages(array $pages): void {
        $this->pages = $this->setArrayField($pages, Page::class);
    }

    /**
     * Returns the products into the related section.
     *
     * @return Product[]
     */
    public function getProducts(): array {
        return $this->products;
    }

    protected function setProducts(array $products): void {
        $this->products = $this->setArrayField($products, Product::class);
    }

    /**
     * Returns the posts into the related section.
     *
     * @return BlogPost[]
     */
    public function getPosts(): array {
        return $this->posts;
    }

    protected function setPosts(array $posts): void {
        $this->posts = $this->setArrayField($posts, BlogPost::class);
    }
}
