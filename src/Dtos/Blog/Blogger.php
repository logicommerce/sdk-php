<?php

namespace SDK\Dtos\Blog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementUrlSeoTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Factories\BloggerLanguageFactory;

/**
 * This is the blogger class.
 * The information of API bloggers will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Blogger::getNumberOfPosts()
 * @see Blogger::getLanguage()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see ElementUrlSeoTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Blog
 */
class Blogger extends Element {
    use ElementTrait, IdentifiableElementTrait, ElementUrlSeoTrait, ElementNameTrait;

    protected int $numberOfPosts = 0;

    protected ?PostBloggerLanguage $language = null;

    /**
     * Returns the blogger number of publications.
     *
     * @return int
     */
    public function getNumberOfPosts(): int {
        return $this->numberOfPosts;
    }

    /**
     * Returns the blogger language object.
     *
     * @see PostBloggerLanguage
     * @return PostBloggerLanguage|NULL
     */
    public function getLanguage(): ?PostBloggerLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = BloggerLanguageFactory::getBloggerLanguage($language);
    }
}
