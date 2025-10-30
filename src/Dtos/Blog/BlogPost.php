<?php

namespace SDK\Dtos\Blog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Dtos\Traits\PublicatedElementTrait;

/**
 * This is the blog post class.
 * The information of API blog posts will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BlogPost::getBlogger()
 * @see BlogPost::getLanguage()
 * @see BlogPost::getSmallImage()
 * @see BlogPost::getLargeImage()
 * @see BlogPost::getMainCategory()
 * @see BlogPost::getMainCategoryName()
 * @see BlogPost::getTags()
 * @see BlogPost::getHits()
 * @see BlogPost::getRating()
 * @see BlogPost::getVotes()
 * @see BlogPost::getLikes()
 * @see BlogPost::getDislikes()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see PublicatedElementTrait
 *
 * @package SDK\Dtos\Blog
 */
class BlogPost extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, PublicatedElementTrait;

    protected ?Blogger $blogger = null;

    protected ?BlogPostLanguage $language = null;

    protected string $smallImage = '';

    protected string $largeImage = '';

    protected int $mainCategory = 0;

    protected string $mainCategoryName = '';

    protected array $tags = [];

    protected int $hits = 0;

    protected float $rating = 0.0;

    protected int $rates = 0;

    protected int $likes = 0;

    protected int $dislikes = 0;

    /**
     * Returns the author (blogger) of this blog post.
     *
     * @see Blogger
     * @return Blogger|NULL
     */
    public function getBlogger(): ?Blogger {
        return $this->blogger;
    }

    protected function setBlogger(array $blogger): void {
        $this->blogger = new Blogger($blogger);
    }

    /**
     * Returns the blog post language object.
     *
     * @see BlogPostLanguage
     * @return BlogPostLanguage|NULL
     */
    public function getLanguage(): ?BlogPostLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new BlogPostLanguage($language);
    }

    /**
     * Returns the blog post small image.
     *
     * @return string
     */
    public function getSmallImage(): string {
        return $this->smallImage;
    }

    /**
     * Returns the blog post large image.
     *
     * @return string
     */
    public function getLargeImage(): string {
        return $this->largeImage;
    }

    /**
     * Returns the internal identifier of the main category for this blog post.
     *
     * @return int
     */
    public function getMainCategory(): int {
        return $this->mainCategory;
    }

    /**
     * Returns the name of the main category for this blog post.
     *
     * @return string
     */
    public function getMainCategoryName(): string {
        return $this->mainCategoryName;
    }

    /**
     * Returns the blog post tags.
     *
     * @return array
     */
    public function getTags(): array {
        return $this->tags;
    }

    protected function setTags(array $tags): void {
        $this->tags = $this->setArrayField($tags, BlogPostTag::class);
    }

    /**
     * Returns the blog post hits.
     *
     * @return int
     */
    public function getHits(): int {
        return $this->hits;
    }

    /**
     * Returns the blog post average vote.
     *
     * @return float
     */
    public function getRating(): float {
        return $this->rating;
    }

    /**
     * Returns the blog post number of rates.
     *
     * @return int
     */
    public function getRates(): int {
        return $this->rates;
    }

    /**
     * Returns the blog post number of likes.
     *
     * @return int
     */
    public function getLikes(): int {
        return $this->likes;
    }

    /**
     * Returns the blog post number of dislikes.
     *
     * @return int
     */
    public function getDislikes(): int {
        return $this->dislikes;
    }
}
