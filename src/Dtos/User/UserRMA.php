<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\RMAStatus;
use SDK\Enums\DocumentType;

/**
 * This is the user returns request main class.
 * The user returns request information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserRMA::getShipments()
 * @see UserRMA::getStatus()
 * @see UserRMA::getSubstatus()
 * @see UserRMA::getDocumentType()
 * @see UserRMA::getReturns()
 *
 * @see UserDocument
 * @see ElementTrait
 *
 * @package SDK\Dtos\User
 */
class UserRMA extends UserDocument {
    use ElementTrait, EnumResolverTrait;

    protected array $shipments = [];

    protected string $status = '';

    protected string $substatus = '';

    protected string $documentType = '';

    protected array $returns = [];

    /**
     * Returns the user RMA shipments.
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
     * Returns the user RMA status.
     *
     * @return string
     */
    public function getStatus(): string {
        return $this->getEnum(RMAStatus::class, $this->status, RMAStatus::PENDING);
    }

    /**
     * Returns the user RMA substatus.
     *
     * @return string
     */
    public function getSubstatus(): string {
        return $this->substatus;
    }
    
    /**
     * Returns the user RMA document type.
     *
     * @return string
     */
    public function getDocumentType(): string {
        return $this->getEnum(DocumentType::class, $this->documentType, DocumentType::ORDER);
    }

    /**
     * Returns the user RMA returns.
     *
     * @return UserReturn[]
     */
    public function getReturns(): array {
        return $this->returns;
    }

    protected function setReturns(array $returns): void {
        $this->returns = $this->setArrayField($returns, UserReturn::class);
    }
}
