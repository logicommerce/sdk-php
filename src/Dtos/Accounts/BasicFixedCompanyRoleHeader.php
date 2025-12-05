<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\BasicFixedCompanyRoleTarget;

/**
 * This is the basic fixed company role header main class.
 * The basic fixed company role header information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see BasicFixedCompanyRoleHeader::getTarget()
 *
 * @see CompanyRoleHeader
 * @see EnumResolverTrait
 * @see BasicFixedCompanyRoleTarget
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
