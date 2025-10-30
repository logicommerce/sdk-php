<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\BasicFixedCompanyRoleTarget;

/**
 * Represents a basic fixed company role header.
 * 
 * @see CompanyRoleHeader
 * @see CompanyRoleType
 * 
 * @package SDK\Dtos\Accounts
 */
class BasicFixedCompanyRoleHeader extends CompanyRoleHeader {
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
