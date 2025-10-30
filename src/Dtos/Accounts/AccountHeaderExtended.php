<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\BaseAccountHeaderTrait;
use SDK\Core\Dtos\Traits\DateAddedTrait;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * AccountHeader class.
 * 
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see EnumResolverTrait
 * 
 * 
 * @package SDK\Dtos\Accounts
 */
class AccountHeaderExtended extends Element {
    use BaseAccountHeaderTrait, DateAddedTrait;

    use ElementTrait {
        __construct as superConstruct;
    }

    protected ?AccountAddressHeaderExtended $invoicingAddress = null;

    protected ?AccountGroup $group = null;

    /**
     * Returns the invoicing address of the account.
     *
     * @return AccountAddressHeaderExtended
     */
    public function getinvoicingAddress(): ?AccountAddressHeaderExtended {
        return $this->invoicingAddress;
    }

    protected function setinvoicingAddress(array $invoicingAddress): void {
        $this->invoicingAddress = new AccountAddressHeaderExtended($invoicingAddress);
    }

    /**
     * Returns the group of the account.
     *
     * @return AccountGroup
     */
    public function getGroup(): ?AccountGroup {
        return $this->group;
    }

    protected function setGroup(array $group): void {
        $this->group = new AccountGroup($group);
    }
}
