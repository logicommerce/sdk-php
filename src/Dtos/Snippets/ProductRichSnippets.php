<?php

namespace SDK\Dtos\Snippets;

use PhpParser\Node\Scalar\String_;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the product rich snippets class.
 * The product rich snippets will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductRichSnippets::getProductGroupId()
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
 * @see ProductBaseRichSnippets
 *
 * @package SDK\Dtos\Snippets
 */
class ProductRichSnippets extends ProductBaseRichSnippets {
    use ElementDescriptionTrait;

    protected string $productGroupId = '';

    protected string $mpn = '';

    protected string $brand = '';
  
    protected array $variesBy = [];

    protected array $variants = [];
    
    protected ?AggregateRating $aggregateRating = null;
    
    protected array $review = [];


    /**
     * Returns the product productGroupId rich snippet.
     *
     * @return string
     */
    public function getProductGroupId(): string {
        return $this->productGroupId;
    }

    /**
     * Returns the product brand rich snippet.
     *
     * @return string
     */
    public function getBrand(): string {
        return $this->brand;
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
     * Returns the product variesBy rich snippet.
     *
     * @return array
     */
    public function getVariesBy(): array {
        return $this->variesBy;
    }

    /***
     * Sets the product variesBy rich snippet.
     * @param array $variesBy
     */
    public function setVariesBy(array $variesBy): void
    {
        $this->variesBy = $variesBy;
    }

    /**
     * Returns the product variants rich snippet.
     *
     * @return array
     */
    public function getVariants(): array {
        return $this->variants;
    }
             
    /***
     * Sets the product variants rich snippet.
     * @param array $variants
     */
    protected function setVariants(array $variants): void
    {
        $this->variants = $this->setArrayField($variants, ProductVariantRichSnippets::class);
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

    /**
     * Returns the product review rich snippet.
     *
     * @return Review[]
     */
    public function getReview(): array
    {
        return $this->review;
    }

    /**
     * Sets the product review rich snippet.
     * @param array $review
     * 
     */
    protected function setReview(array $review): void
    {
        $this->review = $this->setArrayField($review, Review::class);
    }
}
