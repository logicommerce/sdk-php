<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User\Addresses;

use SDK\Enums\UserType;
use SDK\Services\Parameters\Validators\User\BillingAddressParametersValidator;

/**
 * This is the user model (for billing addresses resources) parameters group class.
 *
 * @see BillingAddressParametersGroup::getUserType()
 * 
 * @package SDK\Services\Parameters\Groups\User\Addresses
 */
class BillingAddressParametersGroup extends AddressParametersGroup {

    protected string $userType;

    protected bool $re;

    protected bool $tax;

    /**
     * Sets the user type parameter for this parameters group.
     *
     * @param string $userType
     *
     * @return void
     */
    public function setUserType(string $userType): void {
        if ($userType === UserType::PARTICULAR) {
            $userType = UserType::INDIVIDUAL;
        } elseif ($userType === UserType::BUSINESS) {
            $userType = UserType::COMPANY;
        }
        $this->userType = $userType;
    }


    /**
     * Sets if the user is liable to sales equalization tax.
     *
     * @param bool $re
     *
     * @return void
     */
    public function setRe(bool $re): void {
        $this->re = $re;
    }

    /**
     * Sets if the user is liable to sales equalization tax.
     *
     * @param bool $tax
     *
     * @return void
     */
    public function setTax(bool $tax): void {
        $this->tax = $tax;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): BillingAddressParametersValidator {
        return new BillingAddressParametersValidator();
    }
}
