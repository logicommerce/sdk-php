<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the q (query) parameters validation trait.
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait QParametersValidatorTrait {

    protected function validateQ($q): ?bool {
        return $this->validateString($q);
    }
}
