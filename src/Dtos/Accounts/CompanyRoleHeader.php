<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\CompanyRoleType;

/**
 * Represents a company role header.
 * 
 * @see IdentifiableElementTrait
 * @see CompanyRoleType
 * 
 * @package SDK\Dtos\Accounts
 */
abstract class CompanyRoleHeader extends Element {
    use ElementTrait, EnumResolverTrait, IdentifiableElementTrait;

    protected string $type = '';

    /**
     * Returns the company role type
     * 
     * @return CompanyRoleType
     */
    public function getType(): string {
        return $this->getEnum(CompanyRoleType::class, $this->type, CompanyRoleType::CUSTOM);
    }
}
