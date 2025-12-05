<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\CustomCompanyRoleTarget;

/**
 * This is the custom company role main class.
 * The custom company role information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see CustomCompanyRole::getName()
 * @see CustomCompanyRole::getDescription()
 * @see CustomCompanyRole::getPId()
 * @see CustomCompanyRole::getTarget()
 * @see CustomCompanyRole::getTargetDefault()
 *
 * @see CompanyRole
 * @see EnumResolverTrait
 * @see CustomCompanyRoleTarget
 *
 * @package SDK\Dtos\Accounts
 */
class CustomCompanyRole extends CompanyRole {
    use EnumResolverTrait;

    protected string $name = '';

    protected string $description = '';

    protected string $pId = '';

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
     * Returns the pId.
     * 
     * @return string
     */
    public function getPId(): string {
        return $this->pId;
    }

    protected function setPId(string $pId): void {
        $this->pId = $pId;
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
