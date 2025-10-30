<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\Gender;

/**
 * Represents a registered user header.
 * 
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see EnumResolverTrait
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

    public function getUsername(): string {
        return $this->username;
    }

    protected function setUsername(string $username): void {
        $this->username = $username;
    }

    public function getEmail(): string {
        return $this->email;
    }

    protected function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    protected function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    protected function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    public function getGender(): string {
        return $this->getEnum(Gender::class, $this->gender, '');
    }

    protected function setGender(string $gender): void {
        $this->gender = $gender;
    }
}
