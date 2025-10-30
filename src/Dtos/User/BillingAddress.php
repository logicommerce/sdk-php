<?php

namespace SDK\Dtos\User;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\UserType;

/**
 * This is the billing address class.
 * The billing addresses information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Address
 *
 * @uses EnumResolverTrait
 * 
 * @package SDK\Dtos\User
 */
class BillingAddress extends Address {
    use EnumResolverTrait;

    protected string $userType = '';

    protected bool $re = false;

    /**
     * Returns the address user type.
     *
     * @return string
     */
    public function getUserType(): string {
        return $this->userType;
    }

    /**
     * Returns the address user type.
     *
     * @return string
     */
    protected function setUserType($userType): void { // ENUM
        $this->userType = UserType::getEnum($userType);
    }

    /**
     * Specifies whether the user is liable to sales equalization tax.
     *
     * @return bool
     */
    public function getRe(): bool {
        return $this->re;
    }
}
