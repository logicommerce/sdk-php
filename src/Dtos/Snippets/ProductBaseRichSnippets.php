<?php

namespace SDK\Dtos\Snippets;

use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the product base rich snippets class.
 * The product rich snippets will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductBaseRichSnippets::getImages()
 * @see ProductBaseRichSnippets::getSku()
 * @see ProductBaseRichSnippets::getGtin8()
 * @see ProductBaseRichSnippets::getGtin13()
 * @see ProductBaseRichSnippets::getGtin14() 
 * @see ProductBaseRichSnippets::getIsbn()
 * @see ProductBaseRichSnippets::getOffers()
 * @see ProductBaseRichSnippets::getAdditionalProperties()
 *
 * @see RichSnippets
 * @see ElementTrait
 *
 * @package SDK\Dtos\Snippets
 */
class ProductBaseRichSnippets extends RichSnippets
{
    use ElementTrait, ElementNameTrait;

    protected array $images = [];
    
    protected string $sku = '';

    protected string $gtin8 = '';

    protected string $gtin13 = '';

    protected string $gtin14 = '';
   
    protected string $isbn = '';

    protected ?Offer $offers = null;

    protected array $additionalProperties = [];

    /**
     * Returns the product images rich snippet.
     *
     * @return string[]
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * Returns the product sku rich snippet.
     *
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * Returns the product gtin8 rich snippet.
     *
     * @return string
     */
    public function getGtin8(): string
    {
        return $this->gtin8;
    }

    /**
     * Returns the product gtin13 rich snippet.
     *
     * @return string
     */
    public function getGtin13(): string
    {
        return $this->gtin13;
    }

    /**
     * Returns the product gtin14 rich snippet.
     *
     * @return string
     */
    public function getGtin14(): string
    {
        return $this->gtin14;
    }

    /**
     * Returns the product isbn rich snippet.
     *
     * @return string
     */
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    /**
     * Returns the product offers rich snippet.
     *
     * @return Offer|NULL
     */
    public function getOffers(): ?Offer
    {
        return $this->offers;
    }

    /**
     * Sets the product offers rich snippet.
     */
    protected function setOffers(array $offers): void
    {
        $this->offers = new Offer($offers);
    }

    /**
     * Returns the product additional properties rich snippet.
     *
     * @return AdditionalProperty[]
     */

    public function getAdditionalProperties(): array
    {
        return $this->additionalProperties;
    }

    /*** 
     * Sets the product additional properties rich snippet.
     * @param array $additionalProperties
     * 
     */   

    protected function setAdditionalProperties(array $additionalProperties): void
    {
        $this->additionalProperties = $this->setArrayField($additionalProperties, AdditionalProperty::class);
    }
}
