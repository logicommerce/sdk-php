<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Dtos\Traits\PublicatedElementTrait;

/**
 * This is the News class.
 * The information of API news will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see News::getComments()
 * @see News::getPriority()
 * @see News::getActive()
 * @see News::getSmallImage()
 * @see News::getLargeImage()
 * @see News::getLanguage()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see ElementNameTrait
 * @see PublicatedElementTrait
 *
 * @package SDK\Dtos\Catalog
 */
class News extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, ElementNameTrait, PublicatedElementTrait;

    protected string $comments = '';

    protected int $priority = 0;

    protected bool $active = false;

    protected string $smallImage = '';

    protected string $largeImage = '';

    protected ?NewsLanguage $language = null;

    /**
     * Returns the news comments.
     *
     * @return string
     */
    public function getComments(): string {
        return $this->comments;
    }

    /**
     * Returns the news priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Sets if the news is active or not.
     *
     * @return bool
     */
    public function getActive(): bool {
        return $this->active;
    }

    /**
     * Returns the news small image.
     *
     * @return string
     */
    public function getSmallImage(): string {
        return $this->smallImage;
    }

    /**
     * Returns the news large image.
     *
     * @return string
     */
    public function getLargeImage(): string {
        return $this->largeImage;
    }

    /**
     * Returns the news language object.
     *
     * @see NewsLanguage
     * @return NewsLanguage|NULL
     */
    public function getLanguage(): ?NewsLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new NewsLanguage($language);
    }
}
