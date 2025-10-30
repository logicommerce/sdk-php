<?php

namespace SDK\Dtos\Snippets;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the product rich snippets class.
 * The product rich snippets will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductRichSnippets::getBrand()
 * @see ProductRichSnippets::getSku()
 * @see ProductRichSnippets::getGtin8()
 * @see ProductRichSnippets::getGtin13()
 * @see ProductRichSnippets::getGtin14()
 * @see ProductRichSnippets::getMpn()
 * @see ProductRichSnippets::getIsbn()
 * @see ProductRichSnippets::getReview()
 * @see ProductRichSnippets::getOffers()
 *
 * @see ElementRichSnippets
 * @see ElementTrait
 *
 * @package SDK\Dtos\Snippets
 */
class ProductRichSnippets extends ElementRichSnippets {
    use ElementTrait;

    protected string $brand = '';

    protected string $sku = '';

    protected string $gtin8 = '';

    protected string $gtin13 = '';

    protected string $gtin14 = '';

    protected string $mpn = '';

    protected string $isbn = '';

    protected array $review = [];

    protected ?Offer $offers = null;

    /**
     * Returns the product brand rich snippet.
     *
     * @return string
     */
    public function getBrand(): string {
        return $this->brand;
    }

    /**
     * Returns the product sku rich snippet.
     *
     * @return string
     */
    public function getSku(): string {
        return $this->sku;
    }

    /**
     * Returns the product gtin8 rich snippet.
     *
     * @return string
     */
    public function getGtin8(): string {
        return $this->gtin8;
    }

    /**
     * Returns the product gtin13 rich snippet.
     *
     * @return string
     */
    public function getGtin13(): string {
        return $this->gtin13;
    }

    /**
     * Returns the product gtin14 rich snippet.
     *
     * @return string
     */
    public function getGtin14(): string {
        return $this->gtin14;
    }

    /**
     * Returns the product mpn rich snippet.
     *
     * @return string
     */
    public function getMpn(): string {
        return $this->mpn;
    }

    /**
     * Returns the product isbn rich snippet.
     *
     * @return string
     */
    public function getIsbn(): string {
        return $this->isbn;
    }

    /**
     * Returns the product review rich snippet.
     *
     * @return Review[]
     */
    public function getReview(): array {
        return $this->review;
    }

    protected function setReview(array $review): void {
        $this->review = $this->setArrayField($review, Review::class);
    }

    /**
     * Returns the product offers rich snippet.
     *
     * @return Offer|NULL
     */
    public function getOffers(): ?Offer {
        return $this->offers;
    }

    protected function setOffers(array $offers): void {
        $this->offers = new Offer($offers);
    }
}
