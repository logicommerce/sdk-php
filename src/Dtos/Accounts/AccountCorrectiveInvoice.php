<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DocumentType;

/**
 * This is the account corrective invoice main class.
 * The corrective invoice information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see AccountCorrectiveInvoice::getDocumentType()
 *
 * @see AccountDocument
 * @see ElementTrait
 * @see EnumResolverTrait
 * @see DocumentType
 *
 * @package SDK\Dtos\Accounts
 */

class AccountCorrectiveInvoice extends AccountDocument {
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
