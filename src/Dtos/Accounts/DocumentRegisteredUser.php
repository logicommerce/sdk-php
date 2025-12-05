<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the document registered user main class.
 * The document registered user information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see DocumentRegisteredUser::getUsername()
 * @see DocumentRegisteredUser::getFirstName()
 * @see DocumentRegisteredUser::getLastName()
 * @see DocumentRegisteredUser::getEmail()
 * @see DocumentRegisteredUser::getRegisteredUserId()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Accounts
 */
class DocumentRegisteredUser extends Element {

    use ElementTrait {
        __construct as superConstruct;
    }

    protected string $username = '';
    protected string $firstName = '';
    protected string $lastName = '';
    protected string $email = '';
    protected int $registeredUserId = 0;

    /**
     * Returns the username.
     *
     * @return string
     */
    public function getUsername(): string {
        return $this->username;
    }

    protected function setUsername(string $username): void {
        $this->username = $username;
    }


    /**
     * Returns the first name of the registered user.
     *
     * @return string
     */

    public function getFirstName(): string {
        return $this->firstName;
    }

    protected function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    /**
     * Returns the last name of the registered user.
     *
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

    protected function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    /**
     * Returns the email of the registered user.
     *
     * @return string
     */

    public function getEmail(): string {
        return $this->email;
    }

    protected function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * Returns the registered user ID.
     *
     * @return int
     */
    public function getRegisteredUserId(): int {
        return $this->registeredUserId;
    }
    protected function setRegisteredUserId(int $registeredUserId): void {
        $this->registeredUserId = $registeredUserId;
    }
}
