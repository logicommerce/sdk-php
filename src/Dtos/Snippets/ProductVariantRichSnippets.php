<?php

namespace SDK\Dtos\Snippets;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the product variant rich snippets class.
 * The product variant rich snippets will be stored in that class and will remain immutable (only get methods are available)
 * 
 * @see ProductVariantRichSnippets::getVariantOf()
 * @see ProductVariantRichSnippets::getSize()
 * @see ProductVariantRichSnippets::getColor()
 * @see ProductVariantRichSnippets::getMaterial()
 *
 * @see ProductBaseRichSnippets
 *
 * @package SDK\Dtos\Snippets
 */
class ProductVariantRichSnippets extends ProductBaseRichSnippets
{
    
    protected string $variantOf = '';

    protected string $size = '';

    protected string $color = '';

    protected string $material = '';

    /**
     * Returns the product variantOf rich snippet.
     *
     * @return string
     */
    public function getVariantOf(): string
    {
        return $this->variantOf;
    }

    /**
     * Returns the product size rich snippet.
     *
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * Returns the product color rich snippet.
     *
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }   

    /**
     * Returns the product material rich snippet.
     *
     * @return string
     */
    public function getMaterial(): string
    {
        return $this->material;
    }   
}
