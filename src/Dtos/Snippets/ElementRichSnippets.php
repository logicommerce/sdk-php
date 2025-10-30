<?php

namespace SDK\Dtos\Snippets;

use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;

/**
 * This is the category rich snippets class.
 * The category rich snippets will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ElementRichSnippets::getImages()
 * @see ElementRichSnippets::getAggregateRating()
 *
 * @see RichSnippets
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 *
 * @package SDK\Dtos\Snippets
 */
abstract class ElementRichSnippets extends RichSnippets {
    use ElementNameTrait, ElementDescriptionTrait;

    protected array $images = [];

    protected ?AggregateRating $aggregateRating = null;

    /**
     * Returns the images rich snippet.
     *
     * @return string[]
     */
    public function getImages(): array {
        return $this->images;
    }

    /**
     * Returns the aggregate rating rich snippet.
     *
     * @return AggregateRating|NULL
     */
    public function getAggregateRating(): ?AggregateRating {
        return $this->aggregateRating;
    }

    protected function setAggregateRating(array $aggregateRating): void {
        $this->aggregateRating = new AggregateRating($aggregateRating);
    }
}
