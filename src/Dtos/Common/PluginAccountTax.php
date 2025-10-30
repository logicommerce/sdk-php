<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\PluginAccountTaxTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\TaxType;

/**
 * This is the PluginAccountTax class.
 * The PluginAccountTax information of API elements will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ElementTrait
 * @see PluginAccountTaxTrait
 *
 * @package SDK\Dtos\Common
 */
class PluginAccountTax {
    use ElementTrait, PluginAccountTaxTrait, EnumResolverTrait;

	protected string $type = '';

	/**
	 * Returns the tax type.
	 *
	 * @return string
	 */
	public function getType(): string {
		return $this->getEnum(TaxType::class, $this->type, TaxType::LOGICOMMERCE);
	}

}
