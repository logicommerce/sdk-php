<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\CustomCompanyRoleTarget;

/**
 * Represents a custom company role header.
 * 
 * @see CompanyRoleHeader
 * @see CompanyRoleType
 * 
 * @package SDK\Dtos\Accounts
 */
class CustomCompanyRoleHeader extends CompanyRoleHeader {
    use EnumResolverTrait, IntegrableElementTrait;

    protected string $name = '';

    protected string $description = '';

    protected string $target = "";

    protected bool $targetDefault = false;

    /**
     * Returns the name.
     * 
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    protected function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * Returns the description.
     * 
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    protected function setDescription(string $description): void {
        $this->description = $description;
    }

    /**
     * Returns the target.
     * 
     * @return string
     */
    public function getTarget(): string {
        return $this->getEnum(CustomCompanyRoleTarget::class, $this->target, CustomCompanyRoleTarget::COMPANY_DIVISION_MASTER);
    }

    /**
     * Returns the target default.
     * 
     * @return bool
     */
    public function getTargetDefault(): bool {
        return $this->targetDefault;
    }

    protected function setTargetDefault(bool $targetDefault): void {
        $this->targetDefault = $targetDefault;
    }
}
