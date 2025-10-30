<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the BundleDefinitionSectionItemOption class.
 * The information of API Categories will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BundleDefinitionSectionItemOption::getOptionValueId()
 *
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Catalog
 */
class BundleDefinitionSectionItemOption {
    use ElementTrait;

    protected int $optionId = 0;

    protected int $optionValueId = 0;

    /**
     * Returns the optionId value.
     *
     * @return int
     */
    public function getOptionId(): int {
        return $this->optionId;
    }

    /**
     * Returns the optionValueId value.
     *
     * @return int
     */
    public function getOptionValueId(): int {
        return $this->optionValueId;
    }

}
