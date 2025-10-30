<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the document language element class.
 * The document language element will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentLanguageElement::getLanguageCode()
 *
 * @see Element
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\Documents
 */
abstract class DocumentLanguageElement extends Element {
    use IdentifiableElementTrait, IntegrableElementTrait;

    protected string $languageCode = '';

    /**
     * Returns the language code.
     *
     * @return string
     */
    public function getLanguageCode(): string {
        return $this->languageCode;
    }
}
