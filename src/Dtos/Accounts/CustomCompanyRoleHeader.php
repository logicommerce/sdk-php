<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\CustomCompanyRoleTarget;

/**
 * This is the custom company role header main class.
 * The custom company role header information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see CustomCompanyRoleHeader::getName()
 * @see CustomCompanyRoleHeader::getDescription()
 * @see CustomCompanyRoleHeader::getTarget()
 * @see CustomCompanyRoleHeader::getTargetDefault()
 *
 * @see CompanyRoleHeader
 * @see EnumResolverTrait
 * @see IntegrableElementTrait
 * @see CustomCompanyRoleTarget
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
