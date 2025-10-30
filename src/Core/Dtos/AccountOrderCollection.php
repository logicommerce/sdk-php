<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Accounts\AccountHeader;

/**
 * This is the AccountOrderCollection class
 *
 * @see AccountOrderCollection::getAccounts()
 *
 * @see ElementCollection
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos
 */
class AccountOrderCollection extends ElementCollection {
    use ElementTrait;

    protected array $accounts = [];


    /**
     * Returns the accounts
     *
     * @return array|Accounts
     */
    public function getAccounts(): array {
        return $this->accounts;
    }

    public function setAccounts(array $accounts): void {
        $this->accounts = $this->setArrayField($accounts, AccountHeader::class);
    }
}
