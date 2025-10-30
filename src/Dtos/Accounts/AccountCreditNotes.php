<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DocumentType;

/**
 * This is the account credit notes main class.
 * The account corrective invoice information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AccountCreditNotes::getDocumentType()
 * 
 * @see AccountDocument
 * @uses ElementTrait
 * @uses EnumResolverTrait
 * 
 * 
 * @package SDK\Dtos\Accounts
 */
class AccountCreditNotes extends AccountDocument {
    use ElementTrait, EnumResolverTrait;

    protected string $documentType = '';

    /**
     * Returns the account return document type.
     *
     * @return string
     */
    public function getDocumentType(): string {
        return $this->getEnum(DocumentType::class, $this->documentType, DocumentType::ORDER);
    }
}
