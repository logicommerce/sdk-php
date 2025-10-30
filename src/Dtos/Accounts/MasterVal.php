<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\SimpleAccountRegisteredUserTrait;
use SDK\Enums\MasterType;

/**
 * master class.
 * 
 * @see Element
 * @see ElementTrait
 * @see SimpleAccountRegisteredUserTrait
 * 
 * @package SDK\Dtos\Accounts
 */
class MasterVal extends Element {
    use ElementTrait, SimpleAccountRegisteredUserTrait;

    protected string $type = '';

    protected ?AccountHeaderExtended $account = null;

    protected ?RegisteredUserSimpleProfile $registeredUser = null;

    /**
     * Returns the type.
     * 
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(MasterType::class, $this->type, MasterType::ACCOUNT_REGISTERED_USER);
    }

    /**
     * Returns the account.
     * 
     * @return AccountHeaderExtended
     */
    public function getAccount(): ?AccountHeaderExtended {
        return $this->account;
    }

    protected function setAccount(array $account): void {
        $this->account = new AccountHeaderExtended($account);
    }

    /**
     * Returns the registered user.
     * 
     * @return RegisteredUserSimpleProfile
     */
    public function getRegisteredUser(): ?RegisteredUserSimpleProfile {
        return $this->registeredUser;
    }

    protected function setRegisteredUser(array $registeredUser): void {
        $this->registeredUser = new RegisteredUserSimpleProfile($registeredUser);
    }
}
