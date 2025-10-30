<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Session;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Session\SetCurrencyParametersValidator;

/**
 * This is the session model (set Session currency resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Session
 */
class SetCurrencyParametersGroup extends ParametersGroup {

    protected string $currency;

    /**
     * Sets the currency parameter for this parameters group.
     *
     * @param string $currency
     *
     * @return void
     */
    public function setCurrency(string $currency): void {
        $this->currency = $currency;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): SetCurrencyParametersValidator {
        return new SetCurrencyParametersValidator();
    }
}
