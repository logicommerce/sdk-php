<?php

namespace SDK\Dtos\Blog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the blog tag class.
 * The information of API blog tags will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BlogTag::getLanguage()
 * @see BlogTag::getValue()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 *
 * @package SDK\Dtos\Blog
 */
class BlogTag extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected ?BlogTagLanguage $language = null;

    protected string $value = '';

    protected int $numberOfPosts = 0;

    /**
     * Returns the blog tag language object.
     *
     * @see BlogTagLanguage
     * @return BlogTagLanguage|NULL
     */
    public function getLanguage(): ?BlogTagLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new BlogTagLanguage($language);
    }

    /**
     * Returns the blog tag value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the blog tag number of publications.
     *
     * @return int
     */
    public function getNumberOfPosts(): int {
        return $this->numberOfPosts;
    }
}
