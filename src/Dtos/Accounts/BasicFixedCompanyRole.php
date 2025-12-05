<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\BasicFixedCompanyRoleTarget;

/**
 * This is the basic fixed company role main class.
 * The basic fixed company role information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see BasicFixedCompanyRole::getTarget()
 *
 * @see CompanyRole
 * @see EnumResolverTrait
 * @see BasicFixedCompanyRoleTarget
 *
 * @package SDK\Dtos\Accounts
 */
class BasicFixedCompanyRole extends CompanyRole {
    use EnumResolverTrait;

    protected string $target = "";

    /**
     * Returns the target.
     * 
     * @return string
     */
    public function getTarget(): string {
        return $this->getEnum(BasicFixedCompanyRoleTarget::class, $this->target, BasicFixedCompanyRoleTarget::COMPANY_MASTER);
    }
}
