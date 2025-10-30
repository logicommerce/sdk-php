<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the tax settings class.
 * The tax settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see TaxSettings::getTaxesByShippingAddress()
 * @see TaxSettings::getApplicableTaxes()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class TaxSettings extends Element {
    use ElementTrait;

    protected bool $taxesByShippingAddress = false;

    /**
     * Returns if the taxes will be applied by shipping address.
     * If not, they will be applied by billing address.
     *
     * @return bool
     */
    public function getTaxesByShippingAddress(): bool {
        return $this->taxesByShippingAddress;
    }
}
