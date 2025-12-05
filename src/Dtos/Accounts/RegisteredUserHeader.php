<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\Gender;

/**
 * This is the registered user header main class.
 * The registered user header information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see RegisteredUserHeader::getUsername()
 * @see RegisteredUserHeader::getEmail()
 * @see RegisteredUserHeader::getFirstName()
 * @see RegisteredUserHeader::getLastName()
 * @see RegisteredUserHeader::getGender()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see EnumResolverTrait
 * @see Gender
 *
 * @package SDK\Dtos\Accounts
 */

class RegisteredUserHeader extends Element {
    use IdentifiableElementTrait, IntegrableElementTrait, EnumResolverTrait;

    use ElementTrait {
        __construct as superConstruct;
    }

    protected string $username = '';
    protected string $email = '';
    protected string $firstName = '';
    protected string $lastName = '';
    protected string $gender = '';

    /**
     * Returns the username.
     *
     * @return string
     */
    public function getUsername(): string {
        return $this->username;
    }

    /**
     * Returns the email.
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Returns the first name.
     *
     * @return string
     */
    public function getFirstName(): string {
        return $this->firstName;
    }

    /**
     * Returns the last name.
     *
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

    /**
     * Returns the gender.
     *
     * @return string
     */
    public function getGender(): string {
        return $this->getEnum(Gender::class, $this->gender, '');
    }
}
