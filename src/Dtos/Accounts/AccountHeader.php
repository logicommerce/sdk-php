<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\BaseAccountHeaderTrait;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * AccountHeader class.
 * 
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * 
 * @package SDK\Dtos\Accounts
 */
class AccountHeader extends Element {
    use BaseAccountHeaderTrait;

    use ElementTrait {
        __construct as superConstruct;
    }

    protected ?AccountAddressHeader $invoicingAddress = null;

    /**
     * Returns the invoicing address of the account.
     *
     * @return AccountAddressHeader
     */
    public function getinvoicingAddress(): ?AccountAddressHeader {
        return $this->invoicingAddress;
    }

    protected function setinvoicingAddress(array $invoicingAddress): void {
        $this->invoicingAddress = new AccountAddressHeader($invoicingAddress);
    }
}
