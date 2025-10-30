<?php

namespace SDK\Dtos\Documents\Rich\RichDocumentTaxes;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\Rich\RichDocumentTax;

/**
 * This is the PluginAccount RichDocumentTax class.
 * It is used to store the PluginAccount rich document tax information.
 *
 * @see PluginAccount::getCode()
 *
 * @see DocumentTax
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich\RichDocumentTaxes
 */
class PluginAccount extends RichDocumentTax {
    use ElementTrait;
    
    protected string $code = '';

    /**
     * Returns the rich document tax code.
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

}