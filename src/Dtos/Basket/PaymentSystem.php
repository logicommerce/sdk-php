<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Factories\AppliedTaxFactory;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Core\Dtos\Traits\ElementModuleTrait;
use SDK\Enums\AmountType;

/**
 * This is the basket payment system class.
 * The basket payment systems information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PaymentSystem::getAppliedTaxes()
 * @see PaymentSystem::getCashOnDelivery()
 * @see PaymentSystem::getIncreaseFrom()
 * @see PaymentSystem::getIncreaseMin()
 * @see PaymentSystem::getIncreaseTo()
 * @see PaymentSystem::getIncreaseType()
 * @see PaymentSystem::getIncreaseValue()
 * @see PaymentSystem::getLanguage()
 * @see PaymentSystem::getLogo()
 * @see PaymentSystem::getMaxOrder()
 * @see PaymentSystem::getMinOrder()
 * @see PaymentSystem::getModule()
 * @see PaymentSystem::getPlugin()
 * @see PaymentSystem::getPrice()
 * @see PaymentSystem::getPriority()
 * @see PaymentSystem::getProperties()
 * @see PaymentSystem::getTaxes()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Basket
 */

class PaymentSystem extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, EnumResolverTrait, ElementModuleTrait;

    protected int $priority = 0;

    protected string $logo = '';

    protected string $increaseType = '';

    protected float $increaseValue = 0.0;

    protected float $increaseMin = 0.0;

    protected ?PaymentSystemLanguage $language = null;

    protected array $taxes = [];

    protected float $minOrder = 0.0;

    protected float $maxOrder = 0.0;

    protected float $increaseFrom = 0.0;

    protected float $increaseTo = 0.0;

    protected bool $cashOnDelivery = false;

    protected float $price = 0.0;

    protected array $appliedTaxes = [];

    protected array $properties = [];

    protected int $pluginId = 0;

    /**
     * Returns the payment system priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the payment system increase type.
     *
     * @return string
     */
    public function getIncreaseType(): string { // ENUM
        return $this->getEnum(AmountType::class, $this->increaseType, AmountType::ABSOLUTE);
    }

    /**
     * Returns the payment system increase value.
     *
     * @return float
     */
    public function getIncreaseValue(): float {
        return $this->increaseValue;
    }

    /**
     * Returns the payment system minimum increase value.
     *
     * @return float
     */
    public function getIncreaseMin(): float {
        return $this->increaseMin;
    }

    /**
     * Returns the payment system logo.
     *
     * @return string
     */
    public function getLogo(): string {
        return $this->logo;
    }

    /**
     * Returns the payment system language.
     *
     * @return PaymentSystemLanguage|NULL
     */
    public function getLanguage(): ?PaymentSystemLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new PaymentSystemLanguage($language);
    }

    /**
     * Returns the payment system taxes.
     *
     * @return ItemTax[]
     */
    public function getTaxes(): array {
        return $this->taxes;
    }

    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, ItemTax::class);
    }

    /**
     * Returns the payment system minOrder.
     *
     * @return float
     */
    public function getMinOrder(): float {
        return $this->minOrder;
    }

    /**
     * Returns the payment system maxOrder.
     *
     * @return float
     */
    public function getMaxOrder(): float {
        return $this->maxOrder;
    }

    /**
     * Returns the payment system increaseFrom.
     *
     * @return float
     */
    public function getIncreaseFrom(): float {
        return $this->increaseFrom;
    }

    /**
     * Returns the payment system increaseTo.
     *
     * @return float
     */
    public function getIncreaseTo(): float {
        return $this->increaseTo;
    }

    /**
     * Returns if the payment system is for cash on delivery or not.
     *
     * @return bool
     */
    public function getCashOnDelivery(): bool {
        return $this->cashOnDelivery;
    }

    /**
     * Returns the payment system price.
     *
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * Returns the payment system applied taxes.
     *
     * @return AppliedTax[]
     */
    public function getAppliedTaxes(): array {
        return $this->appliedTaxes;
    }

    protected function setAppliedTaxes(array $appliedTaxes): void {
        $this->appliedTaxes = $this->setArrayField($appliedTaxes, AppliedTaxFactory::class);
    }

    /**
     * Returns the payment system properties.
     *
     * @return PaymentSystemProperty[]
     */
    public function getProperties(): array {
        return $this->properties;
    }

    protected function setProperties(array $properties): void {
        $this->properties = $this->setArrayField($properties, PaymentSystemProperty::class);
    }

    /**
     * Returns the payment system pluginId.
     *
     * @return int
     */
    public function getPluginId(): int {
        return $this->pluginId;
    }
}
