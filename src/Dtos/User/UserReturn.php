<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DocumentType;

/**
 * This is the user return main class.
 * The user return information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserReturn::getCorrectiveInvoices()
 * @see UserReturn::getDocumentType()
 *
 * @see UserDocument
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\User
 */
class UserReturn extends UserDocument {
    use ElementTrait, EnumResolverTrait;

    protected array $correctiveInvoices = [];

    protected string $documentType = '';

    /**
     * Returns the user return corrective invoices.
     *
     * @return UserCorrectiveInvoice[]
     */
    public function getCorrectiveInvoices(): array {
        return $this->correctiveInvoices;
    }

    protected function setCorrectiveInvoices(array $correctiveInvoices): void {
        $this->correctiveInvoices = $this->setArrayField($correctiveInvoices, UserCorrectiveInvoice::class);
    }
    
    /**
     * Returns the user return document type.
     *
     * @return string
     */
    public function getDocumentType(): string {
        return $this->getEnum(DocumentType::class, $this->documentType, DocumentType::ORDER);
    }
}
