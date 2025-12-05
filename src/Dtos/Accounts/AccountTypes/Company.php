<?php

namespace SDK\Dtos\Accounts\AccountTypes;

use SDK\Dtos\Accounts\Account;

/**
 * This is the company account main class.
 * The company account information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see Company::getDescription()
 * @see Company::getEmail()
 *
 * @see Account
 *
 * @package SDK\Dtos\Accounts\AccountTypes
 */
class Company extends Account {

    protected string $description = '';
    protected string $email = '';

    /**
     * Returns the description.
     * 
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    protected function setDescription(string $description): void {
        $this->description = $description;
    }

    /**
     * Returns the email.
     * 
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    protected function setEmail(string $email): void {
        $this->email = $email;
    }
}
