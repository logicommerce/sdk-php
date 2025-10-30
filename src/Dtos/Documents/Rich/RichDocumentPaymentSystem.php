<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Factories\RichDocumentElementTaxFactory;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\PaymentType;

/**
 * This is the rich document payment system class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentPaymentSystem::getTaxes()
 * @see RichDocumentPaymentSystem::getName()
 * @see RichDocumentPaymentSystem::getMessage()
 * @see RichDocumentPaymentSystem::getIncreaseType()
 * @see RichDocumentPaymentSystem::getIncreaseValue()
 * @see RichDocumentPaymentSystem::getPrice()
 * @see RichDocumentPaymentSystem::getPriceWithTaxes()
 * @see RichDocumentPaymentSystem::getIncreaseMin()
 * @see RichDocumentPaymentSystem::getPaymentType()
 * @see RichDocumentPaymentSystem::getPaymentSystemPId()
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentPaymentSystem extends Element{
    use ElementTrait, EnumResolverTrait;

    protected array $taxes = [];
    
    protected string $name = '';
    
    protected string $message = '';
    
    protected string $increaseType = '';
    
    protected float $increaseValue = 0.0;
    
    protected string $price = '';
    
    protected string $priceWithTaxes = '';

    protected float $increaseMin = 0.0;

    protected string $paymentType = '';

    protected string $paymentSystemPId = '';

    /**
     * Returns the rich document payment system taxes.
     *
     * @return RichDocumentElementTax[]
     */
    public function getTaxes(): array {
        return $this->taxes;
    }

    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, RichDocumentElementTaxFactory::class);
    }

    /**
     * Returns the rich document payment system name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the rich document payment system message.
     *
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

    /**
     * Returns the rich document payment system increaseType.
     *
     * @return string
     */
    public function getIncreaseType(): string {
        return $this->increaseType;
    }

    /**
     * Returns the rich document payment system increaseValue.
     *
     * @return float
     */
    public function getIncreaseValue(): float {
        return $this->increaseValue;
    }

    /**
     * Returns the rich document payment system price.
     *
     * @return string
     */
    public function getPrice(): string {
        return $this->price;
    }

    /**
     * Returns the rich document payment system priceWithTaxes.
     *
     * @return string
     */
    public function getPriceWithTaxes(): string {
        return $this->priceWithTaxes;
    }

    /**
     * Returns the rich document payment system increaseMin.
     *
     * @return float
     */
    public function getIncreaseMin(): float {
        return $this->increaseMin;
    }

    /**
     * Returns the rich document payment system paymentType.
     *
     * @return string
     */
    public function getPaymentType(): string {
        return $this->getEnum(PaymentType::class, $this->paymentType, PaymentType::NO_PAY);
    }

    /**
     * Returns the document payment system PId.
     *
     * @return string
     */
    public function getPaymentSystemPId(): string {
        return $this->paymentSystemPId;
    }
}
