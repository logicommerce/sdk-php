<?php

namespace SDK\Dtos\Snippets;

use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Resources\Date;

/**
 * This is the rich snippets review section class.
 * The rich snippets review section will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Review::getAuthor()
 * @see Review::getDatePublished()
 * @see Review::getReviewRating()
 *
 * @see RichSnippets
 * @see ElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 *
 * @package SDK\Dtos\Snippets
 */
class Review extends RichSnippets {
    use ElementTrait, ElementNameTrait, ElementDescriptionTrait;

    protected ?Person $author = null;

    protected ?Date $datePublished = null;

    protected ?Rating $reviewRating = null;

    /**
     * Returns the review rich snippet author.
     *
     * @return Person|NULL
     */
    public function getAuthor(): ?Person {
        return $this->author;
    }

    protected function setAuthor(array $author): void {
        $this->author = new Person($author);
    }

    /**
     * Returns the date when the review was published.
     *
     * @return Date|NULL
     */
    public function getDatePublished(): ?Date {
        return $this->datePublished;
    }

    protected function setDatePublished(string $datePublished): void {
        $this->datePublished = Date::create($datePublished);
    }

    /**
     * Returns the review rich snippet review rating.
     *
     * @return Rating|NULL
     */
    public function getReviewRating(): ?Rating {
        return $this->reviewRating;
    }

    protected function setReviewRating(array $reviewRating): void {
        $this->reviewRating = new Rating($reviewRating);
    }
}
