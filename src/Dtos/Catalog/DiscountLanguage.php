<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the Discounts Language class.
 * The language information of product discounts will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DiscountLanguage::getImage()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 *
 * @package SDK\Dtos\Catalog
 */
class DiscountLanguage {
    use ElementTrait, ElementNameTrait;

    protected string $urlSeo = '';

    protected string $shortDescription = '';

    protected string $smallImage = '';

    protected string $longDescription = '';

    protected string $largeImage = '';

    protected bool $indexable = false;

    protected bool $linkFollowing = false;


    /**
     * URL of the item. Only available under license of module 'DISNV'(Discounts Navigation), otherwise shows null.
     *
     * @return string
     */
    public function getUrlSeo(): string {
        return $this->urlSeo;
    }

    /**
     * Description of the item for the returned language.
     *
     * @return string
     */
    public function getShortDescription(): string {
        return $this->shortDescription;
    }

    /**
     * Image path of the item for the returned language.
     *
     * @return string
     */
    public function getSmallImage(): string {
        return $this->smallImage;
    }




    /**
     * Long description of the item for the returned language.
     *
     * @return string
     */
    public function getLongDescription(): string {
        return $this->longDescription;
    }

    /**
     * Path to large image of the item for the returned language.
     *
     * @return string
     */
    public function getLargeImage(): string {
        return $this->largeImage;
    }

    /**
     * Specifies whether it is indexable. Only available under license of module 'DISNV'(Discounts Navigation), otherwise shows null.
     *
     * @return bool
     */
    public function getIndexable(): bool {
        return $this->indexable;
    }

    /**
     * Specifies the behavior of indexing bots in tracking the item link. Possible values: false - nofollow, true - follow. Only available under license of module 'DISNV'(Discounts Navigation), otherwise shows null.
     *
     * @return bool
     */
    public function getLinkFollowing(): string {
        return $this->linkFollowing;
    }
}
