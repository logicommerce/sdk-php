<?php

namespace SDK\Dtos\Documents\Transactions\Purchases;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Documents\Transactions\DocumentAdditionalInformation;
use SDK\Enums\OrderStatus;

/**
 * This is the order class.
 * The order will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Order::getStatus()
 * @see Order::getSubstatusId()
 * @see Order::getAdditionalInformation()
 * @see Order::getDeliveryDate()
 * @see Order::isPaid()
 * @see Order::getPaymentDate()
 *
 * @see PurchaseDocument
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Transactions\Purchases
 */
class Order extends PurchaseDocument {
    use ElementTrait, EnumResolverTrait;

    protected string $status = '';

    protected int $substatusId = 0;

    protected array $additionalInformation = [];

    protected string $deliveryDate = '';

    protected bool $paid = false;

    protected string $paymentDate = '';

    /**
     * Returns current status of the document.
     *
     * @return string
     */
    public function getStatus(): string {
        return $this->getEnum(OrderStatus::class, $this->status, '');
    }

    /**
     * Returns internal identifier of the substatus of the document.
     *
     * @return int
     */
    public function getSubstatusId(): int {
        return $this->substatusId;
    }

    /**
     * Returns additional information about the document.
     *
     * @return DocumentAdditionalInformation[]
     */
    public function getAdditionalInformation(): array {
        return $this->additionalInformation;
    }

    protected function setAdditionalInformation(array $additionalInformation): void {
        $this->additionalInformation = $this->setArrayField($additionalInformation, DocumentAdditionalInformation::class);
    }

    /**
     * Returns the delivery date.
     *
     * @return string
     */
    public function getDeliveryDate(): string {
        return $this->deliveryDate;
    }

    /**
     * Returns whether the document is paid.
     *
     * @return bool
     */
    public function isPaid(): bool {
        return $this->paid;
    }

    /**
     * Returns date the order was paid.
     *
     * @return string
     */
    public function getPaymentDate(): string {
        return $this->paymentDate;
    }
}
