<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Product;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\RateParametersValidatorTrait;

/**
 * This is the product add comparison product parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Product
 */
class AddComparisonProductParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['id'];

    protected function validateId($id): ?bool {
        return $this->validatePositiveNumeric($id);
    }

}
