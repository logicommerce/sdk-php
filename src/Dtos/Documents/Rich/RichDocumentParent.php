<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DocumentType;

/**
 * This is the rich document parent class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentParent::getDocumentNumber()
 * @see RichDocumentParent::getDate()
 * @see RichDocumentParent::getDocumentType()
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentParent extends Element{
    use ElementTrait, EnumResolverTrait;

    protected string $documentNumber = '';

    protected ?RichDateTime $date = null;

    protected string $documentType = '';

    /**
     * Returns the rich document parent documentNumber.
     *
     * @return string
     */
    public function getDocumentNumber(): string {
        return $this->documentNumber;
    }

    /**
     * Returns the rich document parent date.
     *
     * @return RichDateTime|NULL
     */
    public function getDate(): ?RichDateTime {
        return $this->date;
    }

    protected function setDate(array $date): void {
        $this->date = new RichDateTime($date);
    }

    /**
     * Returns the rich document parent documentType.
     *
     * @return string
     */
    public function getDocumentType(): string {
        return $this->getEnum(DocumentType::class, $this->documentType, DocumentType::ORDER);
    }

}









