<?php

namespace SDK\Dtos\Snippets;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the category rich snippets class.
 * The category rich snippets will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see CategoryRichSnippets::getUrl()
 * @see CategoryRichSnippets::getOffers()
 *
 * @see RichSnippets
 * @see ElementTrait
 *
 * @package SDK\Dtos\Snippets
 */
class CategoryRichSnippets extends RichSnippets {
    use ElementTrait;

    protected string $url = '';

    protected array $images = [];

    protected ?AggregateOffer $offers = null;

    protected ?AggregateRating $aggregateRating = null;

    /**
     * Returns the category url rich snippet.
     *
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }

    /**
     * Returns the images rich snippet.
     *
     * @return string[]
     */
    public function getImages(): array {
        return $this->images;
    }

    /**
     * Returns the category offers rich snippet.
     *
     * @return AggregateOffer|NULL
     */
    public function getOffers(): ?AggregateOffer {
        return $this->offers;
    }

    protected function setOffers(array $offers): void {
        $this->offers = new AggregateOffer($offers);
    }

    /**
     * Returns the aggregate rating rich snippet.
     *
     * @return AggregateRating|NULL
     */
    public function getAggregateRating(): ?AggregateRating
    {
        return $this->aggregateRating;
    }

    protected function setAggregateRating(array $aggregateRating): void
    {
        $this->aggregateRating = new AggregateRating($aggregateRating);
    }
}
