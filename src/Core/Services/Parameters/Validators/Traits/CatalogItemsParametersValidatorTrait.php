<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the catalog items main parameters validation trait.
 * Needs IdentifiableItemsParametersValidatorTrait to work
 *
 * @see IdentifiableItemsParametersValidatorTrait
 * @uses OnlyActiveParametersValidatorTrait
 * @see OnlyActiveParametersValidatorTrait
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait CatalogItemsParametersValidatorTrait {
    use OnlyActiveParametersValidatorTrait;

    protected function validateSortByIdList($sortByIdList): ?bool {
        return $this->validateIdList($sortByIdList);
    }

    protected function validateRandomItems($randomItems): ?bool {
        return $this->validatePositiveNumeric($randomItems);
    }
}
