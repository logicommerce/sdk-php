<?php

namespace SDK\Dtos\Blog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the blog category class.
 * The information of API blog categories will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BlogCategory::getLanguage()
 * @see BlogCategory::getSmallImage()
 * @see BlogCategory::getLargeImage()
 * @see BlogCategory::getPriority()
 * @see BlogCategory::getFeatured()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\Blog
 */
class BlogCategory extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected ?BlogCategoryLanguage $language = null;

    protected int $priority = 0;

    protected string $smallImage = '';

    protected string $largeImage = '';

    protected bool $featured = false;

    /**
     * Returns the blog category language object.
     *
     * @see BlogCategoryLanguage
     * @return BlogCategoryLanguage|NULL
     */
    public function getLanguage(): ?BlogCategoryLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new BlogCategoryLanguage($language);
    }

    /**
     * Returns the blog category small image.
     *
     * @return string
     */
    public function getSmallImage(): string {
        return $this->smallImage;
    }

    /**
     * Returns the blog category large image.
     *
     * @return string
     */
    public function getLargeImage(): string {
        return $this->largeImage;
    }

    /**
     * Returns the blog category priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Sets if the blog category is a featured or not.
     *
     * @return bool
     */
    public function getFeatured(): bool {
        return $this->featured;
    }
}
