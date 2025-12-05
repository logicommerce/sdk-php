<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\SimpleAccountRegisteredUserTrait;
use SDK\Enums\MasterType;

/**
 * This is the master main class.
 * The master information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see Master::getType()
 * @see Master::getRegisteredUser()
 * @see Master::getAccountId()
 *
 * @see Element
 * @see ElementTrait
 * @see SimpleAccountRegisteredUserTrait
 * @see RegisteredUserSimpleProfile
 * @see MasterType
 *
 * @package SDK\Dtos\Accounts
 */
class Master extends Element {
    use ElementTrait, SimpleAccountRegisteredUserTrait;

    protected string $type = '';

    protected ?RegisteredUserSimpleProfile $registeredUser = null;

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

    /**
     * Returns the account id.
     *
     * @return int
     */
    public function getAccountId(): int {
        return $this->accountId;
    }
}
