<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\SimpleAccountRegisteredUserTrait;
use SDK\Enums\MasterType;

/**
 * master ref class.
 * 
 * @see Element
 * @see ElementTrait
 * @see SimpleAccountRegisteredUserTrait
 * 
 * @package SDK\Dtos\Accounts
 */
class MasterRef extends Element {
    use ElementTrait, SimpleAccountRegisteredUserTrait;

    protected string $type = '';

    protected int $registeredUserId = 0;

    protected int $accountId = 0;

    /**
     * Returns the type.
     * 
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(MasterType::class, $this->type, MasterType::ACCOUNT_REGISTERED_USER);
    }


    /**
     * Returns the registered user id.
     *
     * @return int
     */
    public function getRegisteredUserId(): int {
        return $this->registeredUserId;
    }

    /**
     * Returns the account id.
     *
     * @return int
     */
    public function getAccountId(): int {
        return $this->accountId;
    }
}
