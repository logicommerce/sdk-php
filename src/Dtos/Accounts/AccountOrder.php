<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Accounts\AccountDocument;
use SDK\Dtos\Accounts\AccountDocumentShipment;
use SDK\Dtos\Accounts\AccountInvoice;
use SDK\Dtos\Accounts\AccountRMA;
use SDK\Enums\OrderStatus;

/**
 * Account class.
 * 
 * @see Account::getOwnerAccountId()
 * @see Account::getRegisteredUserCreator()
 * @see Account::getShipments()
 * @see Account::getStatus()
 * @see Account::getSubstatus()
 * @see Account::getAllowReturn()
 * @see Account::getTotal()
 * @see Account::getInvoices()
 * @see Account::getRmas()
 * 
 * @see AccountDocument
 * @uses EnumResolverTrait
 * @uses ElementTrait
 * 
 * @package SDK\Dtos\Accounts
 */
class AccountOrder extends AccountDocument {
    use EnumResolverTrait;

    use ElementTrait {
        __construct as superConstruct;
    }

    protected int $ownerAccountId = 0;

    protected ?DocumentRegisteredUser $registeredUserCreator = null;

    protected array $shipments = [];

    protected string $status = '';

    protected string $substatus = '';

    protected bool $allowReturn = false;

    protected float $total = 0.0;

    protected array $invoices = [];

    protected array $rmas = [];

    /**
     * Returns the owner account identifier.
     *
     * @return int
     */
    public function getOwnerAccountId(): int {
        return $this->ownerAccountId;
    }

    /**
     * Returns the registered user creator of the account.
     *
     * @return DocumentRegisteredUser
     */
    public function getRegisteredUserCreator(): ?DocumentRegisteredUser {
        return $this->registeredUserCreator;
    }

    protected function setRegisteredUserCreator(array $registeredUserCreator): void {
        $this->registeredUserCreator = new DocumentRegisteredUser($registeredUserCreator);
    }

    /**
     * Returns the shipments information
     *
     * @return AccountDocumentShipment[]
     */
    public function getShipments(): array {
        return $this->shipments;
    }


    protected function setShipments(array $shipments): void {
        $this->shipments = $this->setArrayField($shipments, AccountDocumentShipment::class);
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
    public function getAllowReturn(): bool {
        return $this->allowReturn;
    }

    /**
     * Returns the order total.
     *
     * @return float
     */
    public function getTotal(): float {
        return $this->total;
    }

    /**
     * Returns invoice information
     *
     * @return AccountInvoice[]
     */
    public function getInvoices(): array {
        return $this->invoices;
    }

    protected function setInvoices(array $invoices): void {
        $this->invoices = $this->setArrayField($invoices, AccountInvoice::class);
    }

    /**
     * Returns RMA information
     *
     * @return AccountRMA[]
     */
    public function getRmas(): array {
        return $this->rmas;
    }

    protected function setRmas(array $rmas): void {
        $this->rmas = $this->setArrayField($rmas, AccountRMA::class);
    }
}
