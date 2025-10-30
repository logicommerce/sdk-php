<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Product;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Product\ProductParametersValidator;

/**
 * This is the product model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Product
 */
class ProductParametersGroup extends ParametersGroup {

    protected string $optionsPriceMode;

    /**
     * Sets a the prices sort criteria for this parameters group.
     *
     * @param string $optionsPriceMode
     *
     * @return void
     */
    public function setOptionsPriceMode(string $optionsPriceMode): void {
        $this->optionsPriceMode = $optionsPriceMode;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): ProductParametersValidator {
        return new ProductParametersValidator();
    }
}
