<?php

namespace SDK\Dtos\Documents\Transactions\Purchases;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Factories\DocumentAppliedTaxFactory;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\AmountType;
use SDK\Enums\PaymentType;

/**
 * This is the document payment system class.
 * The document payment systems will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentPaymentSystem::getPaymentSystemId()
 * @see DocumentPaymentSystem::getPaymentSystemPId()
 * @see DocumentPaymentSystem::getTaxes()
 * @see DocumentPaymentSystem::getMessage()
 * @see DocumentPaymentSystem::getIncreaseType()
 * @see DocumentPaymentSystem::getIncreaseValue()
 * @see DocumentPaymentSystem::getIncreaseMin()
 * @see DocumentPaymentSystem::getPrice()
 * @see DocumentPaymentSystem::getPaymentType()
 * @see DocumentPaymentSystem::getModule()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see ElementNameTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Transactions\Purchases
 */
class DocumentPaymentSystem extends Element {
    use ElementTrait, IdentifiableElementTrait, ElementNameTrait, EnumResolverTrait;

    protected int $paymentSystemId = 0;

    protected string $paymentSystemPId = '';

    protected array $taxes = [];

    protected string $message = '';

    protected string $increaseType = '';

    protected float $increaseValue = 0.0;

    protected float $price = 0.0;

    protected float $increaseMin = 0.0;

    protected string $paymentType = '';

    protected string $module = '';

    /**
     * Returns internal identifier of the payment system.
     *
     * @return int
     */
    public function getPaymentSystemId(): int {
        return $this->paymentSystemId;
    }

    /**
     * Returns public identifier of the payment system.
     *
     * @return string
     */
    public function getPaymentSystemPId(): string {
        return $this->paymentSystemPId;
    }

    /**
     * Returns information about the taxes associated with the payment system.
     *
     * @return DocumentAppliedTax[]
     */
    public function getTaxes(): array {
        return $this->taxes;
    }

    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, DocumentAppliedTaxFactory::class);
    }

    /**
     * Returns message of the payment system for the returned language
     *
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

    /**
     * Returns the type of increase to apply.
     *
     * @return string
     */
    public function getIncreaseType(): string {
        return $this->getEnum(AmountType::class, $this->increaseType, '');
    }

    /**
     * Returns fixed amount or percentage to be added to the total order.
     *
     * @return float
     */
    public function getIncreaseValue(): float {
        return $this->increaseValue;
    }

    /**
     * Returns minimum value to be added to the order total in the event that the calculation using <em>increaseValue</em> is less than this value.
     *
     * @return float
     */
    public function getIncreaseMin(): float {
        return $this->increaseMin;
    }

    /**
     * Returns indicates the price increase on the order due to the payment system.
     *
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * Returns the type of payment system.
     *
     * @return string
     */
    public function getPaymentType(): string {
        return $this->getEnum(PaymentType::class, $this->paymentType, '');
    }

    /**
     * Returns associated plugin module name.
     *
     * @return string
     */
    public function getModule(): string {
        return $this->module;
    }
}
