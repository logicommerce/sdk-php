<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the main indexable trait.
 *
 * @see ElementIndexableTrait::getIndexable()
 * @see ElementIndexableTrait::getLinkFollowing()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait ElementIndexableTrait {

    protected bool $indexable = false;

    protected bool $linkFollowing = false;

   /**
     * Returns if the element is indexable on the website current language.
     *
     * @return bool
     */
    public function getIndexable(): bool {
        return $this->indexable;
    }

    /**
     * Sets if the element link must be a following one or not (value of rel HTML attribute) for the website current language.
     *
     * @return bool
     */
    public function getLinkFollowing(): bool {
        return $this->linkFollowing;
    }
}
