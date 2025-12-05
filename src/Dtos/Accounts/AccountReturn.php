<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DocumentType;

/**
 * This is the account return main class.
 * The account return information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see AccountReturn::getCorrectiveInvoices()
 * @see AccountReturn::getDocumentType()
 * @see AccountReturn::getCreditNotes()
 *
 * @see AccountDocument
 * @see ElementTrait
 * @see EnumResolverTrait
 * @see AccountCorrectiveInvoice
 * @see AccountCreditNotes
 * @see DocumentType
 *
 * @package SDK\Dtos\Accounts
 */
class AccountReturn extends AccountDocument {
    use ElementTrait, EnumResolverTrait;

    protected array $correctiveInvoices = [];

    protected string $documentType = '';

    protected array $creditNotes = [];

    /**
     * Returns the account return corrective invoices.
     *
     * @return AccountCorrectiveInvoice[]
     */
    public function getCorrectiveInvoices(): array {
        return $this->correctiveInvoices;
    }

    protected function setCorrectiveInvoices(array $correctiveInvoices): void {
        $this->correctiveInvoices = $this->setArrayField($correctiveInvoices, AccountCorrectiveInvoice::class);
    }

    /**
     * Returns the account return document type.
     *
     * @return string
     */
    public function getDocumentType(): string {
        return $this->getEnum(DocumentType::class, $this->documentType, DocumentType::ORDER);
    }

    /**
     * Returns the account return credit notes.
     *
     * @return AccountCreditNotes[]
     */
    public function getCreditNotes(): array {
        return $this->creditNotes;
    }

    protected function setCreditNotes(array $creditNotes): void {
        $this->creditNotes = $this->setArrayField($creditNotes, AccountCreditNotes::class);
    }
}
