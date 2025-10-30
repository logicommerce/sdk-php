<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\BasicFixedCompanyRoleTarget;

/**
 * Represents a basic fixed company role.
 * 
 * @see CompanyRole
 * @see CompanyRoleType
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
