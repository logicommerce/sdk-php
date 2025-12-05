<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\CompanyRoleType;

/**
 * This is the base company role header main abstract class.
 * The company role header information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see CompanyRoleHeader::getType()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see EnumResolverTrait
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
