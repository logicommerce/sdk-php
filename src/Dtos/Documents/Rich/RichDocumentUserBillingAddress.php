<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\UserType;

/**
 * This is the rich document user billing address class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentUserBillingAddress::getUserType()
 * 
 * @see RichDocumentUserAddress
 * 
 * @uses EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentUserBillingAddress extends RichDocumentUserAddress{
    use EnumResolverTrait;

    protected string $userType = '';

    /**
     * Returns the rich document user address userType.
     *
     * @return string
     */
    public function getUserType(): string {
        return UserType::getEnum($this->userType, UserType::PARTICULAR);
    }

}









