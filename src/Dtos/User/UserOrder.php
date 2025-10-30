<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\OrderStatus;

/**
 * This is the user order main class.
 * The user order information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserOrder::getShipments()
 * @see UserOrder::getStatus()
 * @see UserOrder::getSubstatus()
 * @see UserOrder::getAllowReturn()
 * @see UserOrder::getInvoices()
 * @see UserOrder::getRMAs()
 *
 * @see UserDocument
 * @see ElementTrait
 *
 * @package SDK\Dtos\User
 */
class UserOrder extends UserDocument {
    use ElementTrait, EnumResolverTrait;

    protected array $shipments = [];

    protected string $status = '';

    protected string $substatus = '';

    protected bool $allowReturn = false;

    protected array $invoices = [];

    protected array $rmas = [];

    protected float $total = 0;

    /**
     * Returns the user shipment.
     *
     * @return UserDocumentShipment[]
     */
    public function getShipments(): array {
        return $this->shipments;
    }

    protected function setShipments(array $shipments): void {
        $this->shipments = $this->setArrayField($shipments, UserDocumentShipment::class);
    }

    /**
     * Returns the order status.
     *
     * @return string
     */
    public function getStatus(): string { // ENUM
        return $this->getEnum(OrderStatus::class, $this->status, OrderStatus::INCOMING);
    }

    /**
     * Returns the order substatus.
     *
     * @return string
     */
    public function getSubstatus(): string {
        return $this->substatus;
    }

    /**
     * Returns the order allow return.
     *
     * @return bool
     */
    public function getAllowReturn(): string {
        return $this->allowReturn;
    }

    /**
     * Returns the user order invoices.
     *
     * @return UserInvoice[]
     */
    public function getInvoices(): array {
        return $this->invoices;
    }

    protected function setInvoices(array $invoices): void {
        $this->invoices = $this->setArrayField($invoices, UserInvoice::class);
    }

    /**
     * Returns the user order rmas.
     *
     * @return UserRMA[]
     */
    public function getRMAs(): array {
        return $this->rmas;
    }

    protected function setRMAs(array $rmas): void {
        $this->rmas = $this->setArrayField($rmas, UserRMA::class);
    }

    /**
     * Returns the user order total.
     *
     * @return float
     */
    public function getTotal(): float {
        return $this->total;
    }

    protected function setTotal(float $total): void {
        $this->total = $total;
    }
}
