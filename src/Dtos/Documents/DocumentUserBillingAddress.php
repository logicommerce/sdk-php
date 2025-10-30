<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\UserType;

/**
 * This is the document user billing address class.
 * The document user billing address will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentUserBillingAddress::getUserType()
 * @see DocumentUserBillingAddress::isRe()
 * @see DocumentUserBillingAddress::isTax()
 *
 * @see DocumentUserAddress
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents
 */
class DocumentUserBillingAddress extends DocumentUserAddress {
    use ElementTrait, EnumResolverTrait;

    protected string $userType = '';

    protected bool $re = false;

    protected bool $tax = false;

    /**
     * Returns the user type.
     *
     * @return string
     */
    public function getUserType(): string {
        return UserType::getEnum($this->userType);
    }

    /**
     * Returns whether sales equalization tax applies to the user.
     *
     * @return bool
     */
    public function isRe(): bool {
        return $this->re;
    }

    /**
     * Returns whether taxes are applied to the user.
     *
     * @return bool
     */
    public function isTax(): bool {
        return $this->tax;
    }
}
