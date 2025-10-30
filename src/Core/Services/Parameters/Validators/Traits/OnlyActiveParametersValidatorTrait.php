<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the only visible items validation trait.
 * @see IdentifiableItemsParametersValidatorTrait
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait OnlyActiveParametersValidatorTrait {

    protected function validateOnlyActive($onlyVisible): ?bool {
        return $this->validateBoolean($onlyVisible);
    }
}
