<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DocumentType;

/**
 * This is the account invoice main class.
 * The account invoice information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see AccountInvoice::getDocumentType()
 *
 * @see AccountDocument
 * @see ElementTrait
 * @see EnumResolverTrait
 * @see DocumentType
 *
 * @package SDK\Dtos\Accounts
 */

class AccountInvoice extends AccountDocument {
    use ElementTrait, EnumResolverTrait;

    protected string $documentType = '';

    /**
     * Returns the account invoice document type.
     *
     * @return string
     */
    public function getDocumentType(): string {
        return $this->getEnum(DocumentType::class, $this->documentType, DocumentType::ORDER);
    }
}
