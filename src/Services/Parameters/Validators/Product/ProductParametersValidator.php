<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Product;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Enums\OptionsPriceMode;

/**
 * This is the product parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Product
 */
class ProductParametersValidator extends ParametersValidator {

    protected function validateOptionsPriceMode($optionsPriceMode): ?bool {
        return $this->validateEnumerateValue($optionsPriceMode, OptionsPriceMode::class);
    }

}
