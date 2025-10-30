<?php

namespace SDK\Dtos\Documents\Rich\RichDocumentElementTaxes;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Documents\Rich\RichDocumentElementTax;

/**
 * This is the PluginAccount RichDocumentElementTax class.
 * It is used to store the PluginAccount rich document element tax information.
 *
 * @see PluginAccount::getReRate()
 * @see PluginAccount::getApplyRE()
 * 
 * @see RichDocumentElementTax
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich\RichDocumentElementTaxes
 */
class PluginAccount extends RichDocumentElementTax {
    use ElementTrait;

	protected string $code = '';

	/**
	 * Returns the rich document element tax code.
	 *
	 * @return string
	 */
	public function getCode(): string {
		return $this->code;
	}

}