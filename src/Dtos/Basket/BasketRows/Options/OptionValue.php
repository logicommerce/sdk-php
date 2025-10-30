<?php

namespace SDK\Dtos\Basket\BasketRows\Options;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the basket product option image value class.
 *
 * @see ImageOptionValue::getImages()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\Basket\BasketRows\Options
 */
class OptionValue extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected int $priority = 0;

    protected float $basePrice = 0.0;

    protected float $retailPrice = 0.0;

    protected float $previousPrice = 0.0;

    protected float $price = 0.0;

    protected float $weight = 0.0;

    protected bool $noReturn = false;

    protected string $value = '';

    protected string $shortDescription = '';

    protected string $longDescription = '';

    /**
     * Returns the option value priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the option value base price.
     *
     * @return float
     */
    public function getBasePrice(): float {
        return $this->basePrice;
    }

    /**
     * Returns the option value retail price.
     *
     * @return float
     */
    public function getRetailPrice(): float {
        return $this->retailPrice;
    }

    /**
     * Returns the option value previous price.
     *
     * @return float
     */
    public function getPreviousPrice(): float {
        return $this->previousPrice;
    }

    /**
     * Returns the option value price.
     *
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * Returns the option value weight.
     *
     * @return float
     */
    public function getWeight(): float {
        return $this->weight;
    }

    /**
     * Sets if the option value has to be refundable/returnable or not.
     *
     * @return bool
     */
    public function getNoReturn(): bool {
        return $this->noReturn;
    }

    /**
     * Returns the option value final value.
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * Returns the option value short description.
     *
     * @return string
     */
    public function getShortDescription(): string {
        return $this->shortDescription;
    }

    /**
     * Returns the option value long description.
     *
     * @return string
     */
    public function getLongDescription(): string {
        return $this->longDescription;
    }
}
