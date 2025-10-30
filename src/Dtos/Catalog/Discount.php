<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Factories\DiscountConditionFactory;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DiscountType;
use SDK\Enums\DiscountApplyTo;

/**
 * This is the product products discount class.
 * The product discounts information will be stored in that class and will remain immutable (only get methods are available)
 * 
 * @see Discount::getPriority()
 * @see Discount::getDisplayPriority()
 * @see Discount::getLanguage()
 * @see Discount::getApplyTo()
 * @see Discount::getType()
 * @see Discount::getConditions()
 * 
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 * @uses IntegrableElementTrait
 * @uses EnumResolverTrait
 *
 * @package SDK\Dtos\Catalog
 */
class Discount extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, EnumResolverTrait;

    protected int $priority = 0;

    protected int $displayPriority = 0;

    protected ?DiscountLanguage $language = null;

    protected string $applyTo = '';

    protected array $conditions = [];

    protected string $type = '';

    /**
     * Returns the discount priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the discount display priority.
     *
     * @return int
     */
    public function getDisplayPriority(): int {
        return $this->displayPriority;
    }

    /**
     * Returns the discount language object.
     *
     * @return DiscountLanguage|NULL
     */
    public function getLanguage(): ?DiscountLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new DiscountLanguage($language);
    }

    /**
     * Returns the element applyTo
     *
     * @return string
     */
    public function getApplyTo(): string { // ENUM
        return $this->getEnum(DiscountApplyTo::class, $this->applyTo, '');
    }

    /**
     * Returns the item type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(DiscountType::class, $this->type, '');
    }

    /**
     * Returns the information about the set conditions for the applicability of the discount. Only available under license of module 'DISNV'(Discounts Navigation).
     *
     * @return BaseDiscountCondition[]
     */
    public function getConditions(): array {
        return $this->conditions;
    }

    protected function setConditions(array $conditions): void {
        $this->conditions = $this->setArrayField($conditions, DiscountConditionFactory::class);
    }
}
