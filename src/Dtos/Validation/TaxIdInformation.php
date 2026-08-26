<?php

namespace SDK\Dtos\Validation;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the TaxIdInformation main class.
 * The TaxIdInformation information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see TaxIdInformation::getTaxIdCompact()
 * @see TaxIdInformation::getTaxIdStandard()
 *
 * @see Element
 *
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Validation
 */
class TaxIdInformation extends Element {
    use ElementTrait;

    protected string $taxIdCompact = '';

    protected string $taxIdStandard = '';

    /**
     * Returns the taxId in compact format
     *
     * @return string
     */
    public function getTaxIdCompact(): string {
        return $this->taxIdCompact;
    }

    /**
     * Returns the taxId in standard format
     *
     * @return string
     */
    public function getTaxIdStandard(): string {
        return $this->taxIdStandard;
    }
}
