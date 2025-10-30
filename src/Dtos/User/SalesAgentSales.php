<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Core\Resources\Date;
use SDK\Enums\OrderStatus;

/**
 * This is the sales agent sales class.
 * The asales agent sales will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see SalesAgentSales::getDocumentNumber()
 * @see SalesAgentSales::getDate()
 * @see SalesAgentSales::getDeliveryDate()
 * @see SalesAgentSales::getShipments()
 * @see SalesAgentSales::getStatus()
 * @see SalesAgentSales::getSubstatus()
 * @see SalesAgentSales::getAllowReturn()
 * @see SalesAgentSales::getSalesAgentDetails()
 * @see SalesAgentSales::getCustomer()
 * @see SalesAgentSales::getRmas()
 * @see SalesAgentSales::getTotal()
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\User
 */
class SalesAgentSales extends Element {
    use ElementTrait, EnumResolverTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected string $documentNumber = '';

    protected ?Date $date = null;

    protected ?Date $deliveryDate = null;

    protected array $shipments = [];

    protected string $status = '';

    protected string $substatus = '';

    protected bool $allowReturn = false;

    protected ?SalesAgentDetails $salesAgentDetails = null;

    protected ?SalesAgentSalesCustomer $customer = null;

    protected array $invoices= [];

    protected array $rmas = [];

    protected float $total = 0.0;


    /**
     * Returns the document number
     *
     * @return string
     */
    public function getDocumentNumber(): string {
        return $this->documentNumber;
    }

    /**
     * Returns the document date.
     *
     * @return Date|NULL
     */
    public function getDate(): ?Date {
        return $this->date;
    }

    protected function setDate(string $date): void {
        $this->date = Date::create($date);
    }

    /**
     * Returns the document delivery date.
     *
     * @return Date|NULL
     */
    public function getDeliveryDate(): ?Date {
        return $this->deliveryDate;
    }

    protected function setDeliveryDate(string $deliveryDate): void {
        $this->deliveryDate = Date::create($deliveryDate);
    }

    /**
     * Returns information about shipment records
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
     * Returns the document status
     *
     * @return string
     */
    public function getStatus(): string { // ENUM
        return $this->getEnum(OrderStatus::class, $this->status, OrderStatus::INCOMING);
    }

    /**
     * Returns the document substatus
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
     * Returns information about sales agent
     *
     * @return SalesAgentDetails|NULL
     */
    public function getSalesAgentDetails(): ?SalesAgentDetails {
        return $this->salesAgentDetails;
    }

    protected function setSalesAgentDetails(array $salesAgentDetails): void {
        $this->salesAgentDetails = new SalesAgentDetails($salesAgentDetails);
    }

    /**
     * Returns information about sales agent
     *
     * @return SalesAgentSalesCustomer|NULL
     */
    public function getCustomer(): ?SalesAgentSalesCustomer {
        return $this->customer;
    }

    protected function setCustomer(array $salesAgentCustomer): void {
        $this->customer = new SalesAgentSalesCustomer($salesAgentCustomer);
    }

    /**
     * Returns invoice information
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
     * Returns information about rmas
     *
     * @return UserRMA[]
     */
    public function getRmas(): array {
        return $this->rmas;
    }

    protected function setRmas(array $rmas): void {
        $this->rmas = $this->setArrayField($rmas, UserRMA::class);
    }

    /**
     * Returns the total of the document
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
