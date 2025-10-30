<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\DateAddedTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Core\Resources\Date;
use SDK\Enums\Gender;

/**
 * This is the RegisteredUser class.
 * 
 * @package SDK\Dtos\Accounts
 */
class RegisteredUser extends Element {
    use IdentifiableElementTrait, IntegrableElementTrait, DateAddedTrait, EnumResolverTrait;

    use ElementTrait {
        __construct as superConstruct;
    }

    protected string $username = '';
    protected string $email = '';
    protected string $firstName = '';
    protected string $lastName = '';
    protected string $gender = '';
    protected ?Date $birthday = null;
    protected ?Date $lastUsed = null;
    protected string $image = '';

    /**
     * Returns the username of the account.
     *
     * @return string
     */
    public function getUsername(): string {
        return $this->username;
    }

    /**
     * Returns the email of the account.
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Returns the first name of the account holder.
     *
     * @return string
     */
    public function getFirstName(): string {
        return $this->firstName;
    }

    /**
     * Returns the last name of the account holder.
     *
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

    /**
     * Returns the gender of the account holder.
     *
     * @return string
     */
    public function getGender(): string {
        return $this->getEnum(Gender::class, $this->gender, '');
    }


    /**
     * Returns the birthday.
     *
     * @return Date|NULL
     */
    public function getBirthday(): ?Date {
        return $this->birthday;
    }

    protected function setBirthday(string $birthday): void {
        $this->birthday = Date::create($birthday);
    }

    /**
     * Returns the last used date.
     *
     * @return Date
     */
    public function getLastUsed(): ?Date {
        return $this->lastUsed;
    }

    protected function setLastUsed(string $lastUsed): void {
        $this->lastUsed = Date::create($lastUsed);
    }

    /**
     * Returns the image of the account.
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }
}
