<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DocumentType;

/**
 * This is the user corrective invoice main class.
 * The user corrective invoice information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserCorrectiveInvoice::getDocumentType()
 * 
 * @see UserDocument
 * @see ElementTrait
 *
 * @package SDK\Dtos\User
 */
class UserCorrectiveInvoice extends UserDocument {
    use ElementTrait, EnumResolverTrait;

    protected string $documentType = '';

    /**
     * Returns the user return document type.
     *
     * @return string
     */
    public function getDocumentType(): string {
        return $this->getEnum(DocumentType::class, $this->documentType, DocumentType::ORDER);
    }
}
