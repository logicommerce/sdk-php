<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\PaginableItemsParametersValidatorTrait;
use SDK\Enums\SaveForLaterListRowsSort;

/**
 * This is the save for later list rows parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class SaveForLaterListRowsParametersValidator extends ParametersValidator {
    use PaginableItemsParametersValidatorTrait;
    
    protected function validateSort($sort): ?bool {
        return $this->validateEnumerateValues($sort, SaveForLaterListRowsSort::class);
    }

}
