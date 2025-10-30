<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the user oauth url class.
 * The user oauth url information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserOauth::getEmail()
 * @see UserOauth::getFirstName()
 * @see UserOauth::getLastName()
 *
 * @see ElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\User
 */
class UserOauth extends Element {
    use ElementTrait, IntegrableElementTrait;

    protected string $email = '';

    protected string $firstName = '';
    
    protected string $lastName = '';
    
    /**
     * Get the user oauth email
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }
    
    /**
     * Get the user oauth firstName
     *
     * @return string
     */
    public function getFirstName(): string {
        return $this->firstName;
    }
    
    /**
     * Get the user oauth lastName
     *
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

}
