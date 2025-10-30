<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Catalog\Product\Product;
use SDK\Enums\LinkedType;
use SDK\Enums\LinkedUnitsLimitation;

/**
 * This is the Linked class.
 * The Linked information of API elements will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Linked::getSectionId()
 * @see Linked::getName()
 * @see Linked::getImage()
 * @see Linked::getType()
 * @see Linked::getPosition()
 * @see Linked::getPercentVariation()
 * @see Linked::getUnitsLimitation()
 * @see Linked::getProducts()
 *
 * @uses ElementTrait
 * @uses EnumResolverTrait
 *
 * @see Element
 * 
 * @package SDK\Dtos\Catalog
 */
class Linked extends Element {
    use ElementTrait, EnumResolverTrait;

    protected int $sectionId = 0;

    protected string $name = '';

    protected string $image = '';

    protected string $type = '';

    protected int $position = 0;

    protected float $percentVariation = 0.0;

    protected string $unitsLimitation = '';

    protected array $products = [];

    /**
     * Returns the internal identifier of the linked items section.
     *
     * @return string
     */
    public function getSectionId(): string {
        return $this->sectionId;
    }

    /**
     * Returns the name of the linked items section.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the image path of the linked items section.
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * Returns the Type of relationship system.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(LinkedType::class, $this->type, LinkedType::RELATED);
    }

    /**
     * Returns the position of the linked items section.
     *
     * @return int
     */
    public function getPosition(): int {
        return $this->position;
    }

    /**
     * Returns the price variation of the linked items section.
     *
     * @return float
     */
    public function getPercentVariation(): float {
        return $this->percentVariation;
    }

    /**
     * Returns the units limitation of the linked items section.
     *
     * @return string
     */
    public function getUnitsLimitation(): string {
        return $this->getEnum(LinkedUnitsLimitation::class, $this->unitsLimitation, LinkedUnitsLimitation::GLOBAL);
    }


    /**
     * Returns the information about products linked to this product.
     *
     * @return Product[]
     */
    public function getProducts(): array {
        return $this->products;
    }

    protected function setProducts(array $products): void {
        $this->products = $this->setArrayField($products, Product::class);
    }
}
