<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\BaseAccountHeaderTrait;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the account header main class.
 * The account header information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see AccountHeader::getInvoicingAddress()
 *
 * @see Element
 * @see ElementTrait
 * @see BaseAccountHeaderTrait
 * @see AccountAddressHeader
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
