<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\CompanyRoleType;

/**
 * Represents a company role.
 * 
 * @see IdentifiableElementTrait
 * @see CompanyRoleFactory
 * @see CompanyRoleType
 * @see CompanyRolePermissionsValues
 * 
 * @package SDK\Dtos\Accounts
 */
abstract class CompanyRole extends Element {
    use IdentifiableElementTrait, EnumResolverTrait;

    protected string $type = '';

    use ElementTrait {
        __construct as superConstruct;
    }

    protected ?CompanyRolePermissionsValues $permissions = null;

    /**
     * Returns the permissions.
     * 
     * @return CompanyRolePermissionsValues|null
     */
    public function getPermissions(): ?CompanyRolePermissionsValues {
        return $this->permissions;
    }

    protected function setPermissions(array $permissions): void {
        $this->permissions = new CompanyRolePermissionsValues($permissions);
    }

    /**
     * Returns the company role type
     * 
     * @return CompanyRoleType
     */
    public function getType(): string {
        return $this->getEnum(CompanyRoleType::class, $this->type, CompanyRoleType::CUSTOM);
    }
}
