<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Account\MasterParametersValidator;

/**
 * This is the master parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class MasterParametersGroup extends ParametersGroup {

    protected ?RegisteredUserParametersGroup $registeredUser;

    protected string $alias;

    protected bool $useShippingAddress;

    protected string $defaultCurrency;

    protected string $defaultLanguange;

    protected string $job;


    /**
     * Sets the registered User parameter for this parameters group.
     *
     * @param RegisteredUserParametersGroup $registeredUser
     *
     * @return void
     */
    public function setRegisteredUser(RegisteredUserParametersGroup $registeredUser): void {
        $this->registeredUser = $registeredUser;
    }

    /**
     * Sets the alias parameter for this parameters group.
     *
     * @param string $alias
     *
     * @return void
     */
    public function setAlias(string $alias): void {
        $this->alias = $alias;
    }

    /**
     * Sets the useShippingAddress parameter for this parameters group.
     *
     * @param bool $useShippingAddress
     *
     * @return void
     */
    public function setUseShippingAddress(bool $useShippingAddress): void {
        $this->useShippingAddress = $useShippingAddress;
    }

    /**
     * Default Currency code in which the price amount is provided, in ISO 4217 format. If not provided, the session's navigation currency will be considered.
     *
     * @param string $defaultCurrency
     *
     * @return void
     */
    public function setDefaultCurrency(string $defaultCurrency): void {
        $this->defaultCurrency = $defaultCurrency;
    }

    /**
     * Sets the default languange ISO code parameter for this parameters group.
     *
     * @param string $defaultLanguange
     *
     * @return void
     */
    public function setDefaultLanguange(string $defaultLanguange): void {
        $this->defaultLanguange = $defaultLanguange;
    }

    /**
     * Sets the job parameter for this parameters group.
     *
     * @param string $job
     *
     * @return void
     */
    public function setJob(string $job): void {
        $this->job = $job;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): MasterParametersValidator {
        return new MasterParametersValidator();
    }
}
