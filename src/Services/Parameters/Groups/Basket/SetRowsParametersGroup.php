<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\HashParametersValidator;

/**
 * This is the hash model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class SetRowsParametersGroup extends ParametersGroup {

    protected string $hash;

    /**
     * Sets the hash parameter for this parameters group.
     *
     * @param string $hash
     *
     * @return void
     */
    public function setHash(string $hash): void {
        $this->hash = $hash;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): HashParametersValidator {
        return new HashParametersValidator();
    }
}
