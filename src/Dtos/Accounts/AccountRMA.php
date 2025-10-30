<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\RMAStatus;
use SDK\Enums\DocumentType;

/**
 * This is the account returns request main class.
 * The account returns request information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AccountRMA::getShipments()
 * @see AccountRMA::getStatus()
 * @see AccountRMA::getSubstatus()
 * @see AccountRMA::getDocumentType()
 * @see AccountRMA::getReturns()
 * 
 * @see AccountDocument
 * @uses ElementTrait
 * @uses EnumResolverTrait
 *
 * @package SDK\Dtos\Accounts
 */
class AccountRMA extends AccountDocument {
    use ElementTrait, EnumResolverTrait;

    protected array $shipments = [];

    protected string $status = '';

    protected string $substatus = '';

    protected string $documentType = '';

    protected array $returns = [];

    /**
     * Returns the account RMA shipments.
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
     * Returns the account RMA status.
     *
     * @return string
     */
    public function getStatus(): string {
        return $this->getEnum(RMAStatus::class, $this->status, RMAStatus::PENDING);
    }

    /**
     * Returns the account RMA substatus.
     *
     * @return string
     */
    public function getSubstatus(): string {
        return $this->substatus;
    }

    /**
     * Returns the account RMA document type.
     *
     * @return string
     */
    public function getDocumentType(): string {
        return $this->getEnum(DocumentType::class, $this->documentType, DocumentType::ORDER);
    }

    /**
     * Returns the account RMA returns.
     *
     * @return AccountReturn[]
     */
    public function getReturns(): array {
        return $this->returns;
    }

    protected function setReturns(array $returns): void {
        $this->returns = $this->setArrayField($returns, AccountReturn::class);
    }
}
