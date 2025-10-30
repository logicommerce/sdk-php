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
 * @see ElementRichSnippets
 * @see ElementTrait
 *
 * @package SDK\Dtos\Snippets
 */
class CategoryRichSnippets extends ElementRichSnippets {
    use ElementTrait;

    protected string $url = '';

    protected ?AggregateOffer $offers = null;

    /**
     * Returns the category url rich snippet.
     *
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
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
}
